<?php
include('conexao.php');
include('verificarlogin.php');
print_r($_SESSION); 
print_r($_POST);

if (count($_SESSION['carrinho']) !=0){
    $usuario_id = $_SESSION['usuario_id'];
    $total = floatval($_POST['total']);

    $sql = "INSERT INTO `pedidos` (`usuario`, `valor_pedido`, `data_pedido`) VALUES ('$usuario_id', '$total', now())";

    $conexao->query($sql) or die('ERRO');

    $dado = $conexao->query("SELECT * FROM `pedidos` ORDER BY `data_pedido` DESC LIMIT 1")->fetch_assoc();
    $pedido_id = $dado['pedido_id'];

    foreach ($_SESSION['carrinho'] as $produto_id => $qnt) {
        $sql = "INSERT INTO `pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ( '$pedido_id', '$produto_id', '$qnt')";
        $conexao->query($sql) or die('ERRO');
    }
    $_SESSION['carrinho'] = array();
}
header("Location: ../index.php");

