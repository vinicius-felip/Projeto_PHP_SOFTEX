<?php 

if (!isset($_GET['pagina'])){$_GET['pagina'] = 0;}

$inicio_prod = intval($_GET['pagina']*18);

if (isset($_GET['categoria'])){
    $categoria = mysqli_real_escape_string($conexao,$_GET['categoria']);
    $query = "SELECT * FROM `produto` WHERE categoria = '$categoria' LIMIT $inicio_prod, 18";
    $total_produtos = $conexao->query("SELECT * FROM produto WHERE categoria = '$categoria'")->num_rows;

}else{
    if(isset($_GET['buscar'])){
        $buscar = mysqli_real_escape_string($conexao,$_GET['buscar']);
        $query = "SELECT * FROM `produto` WHERE `nome` LIKE '%$buscar%' ORDER BY `produto_id` ASC";
        $total_produtos = $conexao->query($query)->num_rows;
    }
    else{
        $query = "SELECT * FROM `produto` LIMIT $inicio_prod, 18";
        $total_produtos = $conexao->query("SELECT * FROM produto")->num_rows;
    }
}

$result = mysqli_query($conexao, $query);

$num = mysqli_num_rows($result);

$num_paginas = ceil($total_produtos/18);

