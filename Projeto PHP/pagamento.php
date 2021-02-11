<?php
require('config/verificarlogin.php');
require('config/conexao.php');
if (count($_SESSION['carrinho']) ==0){
  header("Location: index.php");
  exit;
}
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM `usuario` WHERE `usuario_id` = '$usuario_id'";
$result = $conexao->query($sql) or die('EWRRRO');
$dados = mysqli_fetch_assoc($result);
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
    <form action="config/finalizar.php" method="post">
      <div class="container">
        <h1>Finalizar Pedido</h1>
        <hr>
        <div class="row pb-5">
          <div class="col-lg-6">
            <fieldset class="row g-2">
              <h2 class="text-primary pb-2">Forma de pagamento</h2>
              <small class="pb-5">Selecione sua forma de pagamento:</small>
              <div class="col-sm-6">
                <div class="card" style="width: 15rem;">
                  <img src="img/boleto.png" class="card-img-top" alt="">
                  <div class="card-body">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="pagamento" id="exampleRadios1" value="Boleto Bancário" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Boleto Bancário
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card" style="width: 15rem;">
                  <img src="img/cartao.png" class="card-img-top" alt="">
                  <div class="card-body">
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                      <label class="form-check-label" for="exampleRadios3">
                        Cartão de Crédito
                      </label>
                    </div>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Indisponível no momento</small>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="col-lg-6">
            <div class="card bg-dark text-white">
              <fieldset class="row g-2 p-1">
                <legend>Endereço</legend>
                <div class="col-lg-4 col-sm-6">
                  <label for="" class="text-white form-label">CEP</label>
                  <div class="input-group">
                    <input disabled  type="text" class="form-control" value="<?php echo $dados['cep'] ?>">
                  </div>
                </div>
                <div class="col-lg-2 offset-lg-6  col-sm-2 offset-sm-4 pt-4">
                  <a class="btn bg-primary text-white" href="meusdados.php">Alterar</a>
                </div>
                <div class="col-lg-12">
                  <label for="" class="text-white form-label">Endereço</label>
                  <div class="input-group">
                    <textarea disabled  type="text" class="form-control" style="height: 70px; resize: none;" ><?php echo $dados['endereco'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <label for="" class="text-white form-label">Número</label>
                  <div class="input-group">
                    <input disabled  type="text" class="form-control" value="<?php echo $dados['numero'] ?>" >
                  </div>
                </div>
                <div class="col-md-8   ">
                  <label for="" class="text-white form-label">Complemento</label>
                  <div class="input-group">
                    <input disabled  type="text" class="form-control" value="<?php echo $dados['complemento'] ?>">
                  </div>
                </div>
                <div class="col-lg-12">
                  <label for="" class="text-white form-label">Referência</label>
                  <div class="input-group">
                    <textarea disabled  type="text" class="form-control" style="height: 70px; resize: none;"><?php echo $dados['referencia'] ?></textarea>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-end">
          <h4 class="text-dark mb-3">Valor Total: R$ <?php echo number_format($_SESSION['total'], 2, ',', '.') ?></h4>
          <a href="index.php" class="btn btn-outline-danger btn-lg">Cancelar Pedido</a>
          <button type="submit" class="btn bg-primary text-white btn-lg">Finalizar Pedido</button>
        </div>
      </div>
    </form>
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