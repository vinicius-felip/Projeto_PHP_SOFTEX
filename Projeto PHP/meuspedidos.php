<?php
session_start();
require('config/conexao.php');

$usuario_id = $_SESSION['usuario_id'];


if (!isset($_GET['pedido'])) {
  $sql = "SELECT * FROM `pedidos` WHERE `usuario` = '$usuario_id'";
  $result = $conexao->query($sql) or die('EWRRRO');
} else {
  $pedido_id = mysqli_real_escape_string($conexao, intval($_GET['pedido']));
  $sql = "SELECT produto_id, quantidade FROM `pedido_produto` WHERE `pedido_id` = '$pedido_id'";
  $result = $conexao->query($sql) or die('EWRRRO');
  $sql = "SELECT * FROM `pedidos` WHERE `pedido_id` = $pedido_id";
  $result_pedido = $conexao->query($sql) or die('EWRRRO');
  $dados_pedido = $result_pedido->fetch_assoc();
  $pagamento  = $dados_pedido['pagamento'];
  $valor_pedido = $dados_pedido['valor_pedido'];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
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
            <?php if (isset($_SESSION['email'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo  strtok($_SESSION['nome'], " ") ?></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="meusdados.php">Meus Dados</a></li>
                  <li><a class="dropdown-item" href="meuspedidos.php">Meus Pedidos</a></li>
                  <li><a class="dropdown-item text-light bg-danger" href="config/logout.php">Sair</a></li>
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
      <div class="row g-3">
        <?php if (!isset($_GET['pedido'])) {
          while ($dados = $result->fetch_assoc()) { ?>
            <div class="offset-lg-4 offset-sm-2 offset-md-3 offset-2">
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <div class="row g-1">
                    <div class="col-12 text-start">
                      <b>
                        <high class="card-title">Pedido #<?php echo $dados['pedido_id'] ?></high>
                      </b>
                    </div>
                    <div class="col-12 text-start">
                      <p class="card-title">Data pedido: <?php echo $dados['data_pedido'] ?></high>
                    </div>
                    <div class="col-12 pb-1 text-start">
                      <p class="card-text">Status: <?php if ($dados['status'] == 1) { ?>
                          <small class="bg-warning text-white p-1">Aguardando Pagamento</small>
                        <?php }
                                                    if ($dados['status'] == 2) { ?>
                          <small class="bg-info text-white p-1">Separando</small>
                        <?php }
                                                    if ($dados['status'] == 3) { ?>
                          <small class="bg-info text-white p-1">Em destino</small>
                        <?php }
                                                    if ($dados['status'] == 4) { ?>
                          <small class="bg-success text-white p-1">Entregue</small>
                        <?php } ?>
                      </p>
                    </div>
                    <div class="col-12 pb-3 text-start">
                      <p class="card-text">Total: <?php echo number_format($dados['valor_pedido'], 2, ',', '.') ?></p>
                    </div>
                  </div>
                  <a href="meuspedidos.php?pedido=<?php echo $dados['pedido_id'] ?>" class="btn bg-primary text-white">Detalhes</a>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="col-10 offset-1">
            <b>
              <h1 class="text-dark text-center p-4 mb-3">Pedido #<?php echo $_GET['pedido'] ?></h1>
            </b>
            <div class="row g-5">
              <div class="text-center col-xl-4 col-lg-4 col-4">
                <legend>Produto</legend>
              </div>
              <div class="text-end col-xl-5 col-lg-5 text-lg-end col-4">
                <legend>Quantidade</legend>
              </div>
              <div class="text-center col-xl-2 col-lg-2 col-2">
                <legend style="padding-left: 35px;">Preço</legend>
              </div>
            </div>
            <ul class="list-group mb-3">
              <?php while ($dados_produto = $result->fetch_assoc()) {
                $produto_id = $dados_produto['produto_id'];
                $sql = "SELECT * FROM `produto` WHERE `produto_id` = '$produto_id'";
                $result2 = $conexao->query($sql) or die('EWRRRO');
                $dados = $result2->fetch_assoc(); ?>
                <li class="list-group-item py-3 ">
                  <div class="row g-3">
                    <div class="col-4 col-md-3 col-lg-2">
                      <a href="#">
                        <img src="img/produtos/<?php echo $dados['produto_id'] ?>.jpg" class="img-thumbnail">
                      </a>
                    </div>
                    <div class="col-5 col-md-5 col-lg-6 col-xl-6 text-left align-self-center">
                      <h4><b><a href="http://localhost/php/Projeto%20PHP/index.php?buscar=<?php echo $dados['nome'] ?>" class="text-decoration-none text-primary"><?php echo $dados['nome'] ?></a></b></h4>
                      <h5 class="text-muted">
                        <small><?php echo $dados['detalhe'] ?></small>
                      </h5>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1 col-1 align-self-center">
                      <p><?php echo $dados_produto['quantidade'] ?></p>
                    </div>
                    <div class="  text-end col-xl-2 col-lg-2 col-md-2 col-2 align-self-center">
                      <p>R$ <?php echo $dados['preco'] ?></p>
                    </div>
                  </div>
                </li>
              <?php }  ?>
              <div class="text-end pt-5">
                <h4 class="text-dark mb-3">Valor Total: R$ <?php echo number_format($valor_pedido, 2, ',', '.') ?></h4>
                <a href="meuspedidos.php" class="btn bg-primary text-white btn-lg">Voltar</a>
              </div>
            <?php } ?>
          </div>
      </div>
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
  <script async="" src="//www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>

</html>