<?php
session_start();
require('config/conexao.php');  

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}

if (isset($_GET['acao'])) {
  if ($_GET['acao'] == 'add') {
    $id = intval($_GET['id']);
    $qnt = intval($_POST['qnt']);
    if (!isset($_SESSION['carrinho'][$id])) {
      $_SESSION['carrinho'][$id] =  $qnt;
    } else {
      $_SESSION['carrinho'][$id] += $qnt;
    }
  }

  if ($_GET['acao'] == 'excluirCarrinho') {
    unset($_SESSION['carrinho']);
  }

  if ($_GET['acao'] == 'excluirProduto') {
    $id = intval($_GET['id']);
    unset($_SESSION['carrinho'][$id]);
  }

  if ($_GET['acao'] == 'atualizarCarrinho') {
    foreach ($_POST as $produto_id => $qnt){
      $_SESSION['carrinho'][$produto_id] = $qnt;
    }
  }

  header("Location: carrinho.php");
}
?>


<!DOCTYPE html>
<html lang="ptbr">

<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="msapplication-TileColor" content="#da532c" />
  <meta name="msapplication-config" content="img/favicon/browserconfig.xml" />
  <meta name="theme-color" content="#ffffff" />
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="node_modules/bootstrap/js/src/bootstrap-input-spinner.js"></script>
  <style>
    html {
      overflow-y: scroll;
    }

    :root {
      overflow-y: auto;
      overflow-x: hidden;
    }

    :root body {
      position: absolute;
    }

    body {
      width: 100vw;
    }
  </style>
</head>

<body style="min-width: 372px">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3 sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/pernambuco-alfabeto-f.png" alt="FeiraPERNAMBUCANA" width="35px" style="margin-right: 8px" /><strong>Feira PERNAMBUCANA </strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav flex-grow-1">
          <li class="nav-item">
            <a href="index.php" class="nav-link text-white">Principal</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lista de produtos
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a href="index.php?categoria=verduras/legumes" class="dropdown-item" href="#">Verduras/Legumes</a></li>
              <li><a href="index.php?categoria=frutas" class="dropdown-item" href="#">Frutas</a></li>
              <li><a href="index.php?categoria=folhagens" class="dropdown-item" href="#">Folhagens</a></li>
              <li><a href="index.php?categoria=raizes/tuberculos" class="dropdown-item" href="#">Raízes/Tubérculos</a></li>
            </ul>
          </li>
        </ul>
        <div class="align-self-end">
          <ul class="navbar-nav">
            <?php if (isset($_SESSION['nome'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  strtok($_SESSION['nome'], " ") ?></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="meusdados.php">Meus Dados</a></li>
                  <li><a class="dropdown-item" href="meuspedidos.php">Meus Pedidos</a></li>
                  <li><a class="dropdown-item text-dark bg-danger" href="config/logout.php">Sair</a></li>
                </ul>
              </li><?php } else { ?>
              <li class="nav-item">
                <a href="cadastrar.php" class="nav-link text-white">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a href="entrar.php" class="nav-link text-white">Entrar</a>
              </li><?php } ?>
            <li class="nav-item">
              <a href="carrinho.php" class="nav-link text-white">
                <svg class="bi" width="24" height="24" fill="currentColor">
                  <use xlink:href="bi.svg#cart3"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main class="mb-5 pb-5">
    <div class="container">
      <h1>Carrinho de Compras</h1>
      <hr>
      <form action="?acao=atualizarCarrinho" method="post">
        <ul class="list-group mb-3">
          <?php $total = 0;
          if (count($_SESSION['carrinho']) == 0) {
            echo "<li class='list-group-item py-3'>";
            echo "<legend class ='text-muted'>Seu carrinho está vázio.</legend>";
          } else {
            foreach ($_SESSION['carrinho'] as $produto_id => $qnt) {
              $sql = "SELECT * FROM `produto` WHERE `produto_id` = '$produto_id'";
              $result =  mysqli_query($conexao, $sql);
              $dados = mysqli_fetch_assoc($result);
              $total += $dados['preco'] * $qnt; ?>
              <li class="list-group-item py-3 ">
                <div class="row g-3">
                  <div class="col-4 col-md-3 col-lg-2">
                    <a href="#">
                      <img src="img/produtos/<?php echo $dados['produto_id'] ?>.jpg" class="img-thumbnail">
                    </a>
                  </div>
                  <div class="col-8 col-md-9 col-lg-8 col-xl-8 text-left align-self-center">
                    <h4><b><a href="http://localhost/php/Projeto%20PHP/index.php?buscar=<?php echo $dados['nome'] ?>" class="text-decoration-none text-primary"><?php echo $dados['nome'] ?></a></b></h4>
                    <h5 class="text-muted">
                      <small><?php echo $dados['detalhe'] ?></small>
                    </h5>
                  </div>
                  <div class="col-6 offset-6 col-sm-4 offset-sm-6 cold-md-4 offset-md-8 col-lg-2 offset-lg-0 align-self-center mt-3">
                    <div class="input-group customSpinner">
                      <button type="button" class="btn btn-outline-primary btn-sm spinnerbutton spinnerMinus spinner-roundbutton">
                        <svg class="bi" width="16" height="16" fill="currentColor">
                          <use xlink:href="bi.svg#caret-down"></use>
                        </svg>
                      </button>
                      <input name="<?php echo $dados['produto_id'] ?>" type="text" readonly class="text-center form-control spinnerVal spinner-roundVal" value="<?php echo $qnt ?>">
                      <button type="button" class="btn btn-outline-primary btn-sm spinnerbutton spinnerPlus spinner-roundbutton">
                        <svg class="bi" width="16" height="16" fill="currentColor">
                          <use xlink:href="bi.svg#caret-up"></use>
                        </svg>
                      </button>
                      <a href="carrinho.php?acao=excluirProduto&id=<?php echo $dados['produto_id'] ?>" class="btn border-primary btn-outline-danger btn-sm">
                        <svg class="bi" width="16" height="16" fill="currentColor">
                          <use xlink:href="bi.svg#trash"></use>
                        </svg>
                      </a>
                    </div>
                    <div class="text-end mt-2">
                      <small class="text-secondary">Valor Kg: R$ <?php echo number_format($dados['preco'], 2, ',', '.') ?></small><br>
                      <span class="text-dark">Valor Item: R$ <?php echo number_format($dados['preco'] * $qnt, 2, ',', '.') ?></span>
                    </div>
                  </div>
                </div>
              </li>
          <?php }
          } ?>
          <li class="list-group-item py-3">
            <div class="align-self-end">
              <button type="submit" class="btn btn-warning btn-lg">Atualizar Carrinho</button>
      </form>
    </div>
      <div class="text-end">
        <h4 class="text-dark mb-3">Valor Total: R$ <?php $_SESSION['total'] = $total; echo number_format($total, 2, ',', '.') ?></h4>
        <a href="carrinho.php?acao=excluirCarrinho" class="btn btn-outline-danger btn-lg">Excluir Carrinho</a>
        <a href="index.php" class="btn btn-outline-success btn-lg">Continuar Comprando</a>
        <a href="pagamento.php" class="btn bg-primary text-white btn-lg" >Pagamento</a>
      </div>
    </li>
    </ul>
    </div>
  </main>

  <footer class="boder-top fixed-bottom text-muted bg-light">
    <div class="container">
      <div class="row py-3">
        <div class="col-12 col-md-4 text-center text-md-left">
          &copy; 2020 - Feira PERNAMBUCANA
        </div>
        <div class="col-12 col-md-4 text-center text-md-left">
          <a href="contato.php">Contato</a>
        </div>
        <div class="col-12 col-md-4 text-center text-md-left">
          <a href="troca.php">Trocas e Devoluções</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>