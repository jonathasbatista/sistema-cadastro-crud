<?php
session_start();

require_once 'db_connect.php';

function clear ($input){
    $var = mysqli_escape_string($GLOBALS['$connect'], $input);
    $var = htmlspecialchars($var);

    return $var;
}

if(isset($_POST['btn-cadastrar'])){
    $nome = clear($connect, $_POST['nome']);
    $sobrenome = clear($connect, $_POST['sobrenome']);
    $email = clear($connect, $_POST['email']);
    $idade = clear($connect, $_POST['idade']);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php?sucesso');
    } else {
        $_SESSION['mensagem'] = "Não foi possível realizar o cadastro!";
        header('Location: ../index.php?falha');
    }
}
?>