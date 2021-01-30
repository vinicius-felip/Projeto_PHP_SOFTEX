<?php 
$qnt_produtos = 18;
if (!isset($_GET['pagina'])){$_GET['pagina'] = 0;}
$inicio_prod = intval($_GET['pagina']*$qnt_produtos);

if (isset($_GET['categoria'])){
    $categoria = mysqli_real_escape_string($conexao,$_GET['categoria']);
    $query = "SELECT * FROM `produto` WHERE categoria = '$categoria' LIMIT $inicio_prod, $qnt_produtos";
    $total_produtos = $conexao->query("SELECT * FROM produto WHERE categoria = '$categoria'")->num_rows;
}else{
    $query = "SELECT * FROM `produto` LIMIT $inicio_prod, $qnt_produtos";
    $total_produtos = $conexao->query("SELECT * FROM produto")->num_rows;
}

$result = mysqli_query($conexao, $query);

$num = mysqli_num_rows($result);

$num_paginas = ceil($total_produtos/$qnt_produtos);

