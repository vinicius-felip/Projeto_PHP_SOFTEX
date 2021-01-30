<?php
session_start();
include('conexao.php');


$nome = mysqli_real_escape_string($conexao, $_POST['cadnome']);
$cpf = mysqli_real_escape_string($conexao,trim($_POST['cadcpf']));
$data_nascimento = mysqli_real_escape_string($conexao,trim($_POST['caddatanascimento']));
$email = mysqli_real_escape_string($conexao,trim($_POST['cademail']));
$telefone = mysqli_real_escape_string($conexao,trim($_POST['cadtelefone']));
$cep = mysqli_real_escape_string($conexao,trim($_POST['cadcep']));
$numero = mysqli_real_escape_string($conexao,trim($_POST['cadnumero']));
$complemento = mysqli_real_escape_string($conexao,trim($_POST['cadcomplemento']));
$referencia = mysqli_real_escape_string($conexao,trim($_POST['cadreferencia']));
$senha = mysqli_real_escape_string($conexao,trim(md5($_POST['cadsenha'])));
$confsenha = mysqli_real_escape_string($conexao,trim(md5($_POST['cadconfsenha'])));


$sql = "SELECT COUNT(*) as total from usuario where cpf = '$cpf'";
$result = mysqli_query($conexao, $sql);
$qntcpf = mysqli_fetch_assoc($result);

$sql = "SELECT COUNT(*) as total from usuario where email = '$email'";
$result = mysqli_query($conexao, $sql);
$qntemail = mysqli_fetch_assoc($result);


if ($qntcpf['total'] == 1){
    $_SESSION['cpf_existe'] = true;
    header('Location: ../cadastrar.php');
    exit;
}
if ($qntemail['total'] == 1){
    $_SESSION['email_existe'] = true;
    header('Location: ../cadastrar.php');
    exit;
}

if ($senha != $confsenha){
    $_SESSION = $_POST;
    $_SESSION['senha_errada'] = true;
    header('Location: ../cadastrar.php');
    $conexao->close();
    exit;
}

$sql = "INSERT INTO usuario (nome, cpf, data_nascimento, email, telefone, cep, numero, complemento, referencia, senha, data_cadastro) VALUES ('$nome', '$cpf', '$data_nascimento', '$email', '$telefone', '$cep', '$numero', '$complemento', '$referencia', '$senha', now())";


if ($conexao->query($sql) === TRUE){
    $_SESSION['usuario_cadastrado'] = true;
    header('Location: ../entrar.php');
    $conexao->close();  
    exit;
    
} else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
    echo "<a href='../cadastrar.php'>Voltar para a pagina de cadastro</a>";
  }

?>