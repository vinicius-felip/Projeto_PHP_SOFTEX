<?php
include('conexao.php');
include('verificarlogin.php');

if (count($_SESSION['carrinho']) !=0){
    $usuario_id = $_SESSION['usuario_id'];
    $total = floatval($_SESSION['total']);
    $pagamento = mysqli_real_escape_string($conexao,$_POST['pagamento']);

    $sql = "INSERT INTO `pedidos` (`usuario`, `valor_pedido`, `pagamento`, `status`, `data_pedido`) VALUES ('$usuario_id', '$total', '$pagamento' , 1, now())";

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
exit;

