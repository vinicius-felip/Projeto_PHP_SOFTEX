<?php
include('conexao.php');
session_start();

if(empty($_POST['email']) and empty($_POST['senha'])) {
    header('Location: ../entrar.php');  
    exit();
}
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT usuario_id, email, nome FROM usuario WHERE email = '$email' and senha = md5('$senha')";

$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1){
    $_SESSION  = mysqli_fetch_assoc($result);
    header('Location: ../index.php');
    exit();
}
else{
    $_SESSION['nao_autenticado'] = true;
    $_SESSION['email_digitado'] = $_POST['email'];
    header('Location: ../entrar.php');
    exit();
}

