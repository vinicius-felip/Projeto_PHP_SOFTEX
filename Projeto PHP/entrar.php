<?php
session_start();
include_once('config/verificarlogout.php');
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
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
              <li><a class="dropdown-item" href="#">Frutas</a></li>
              <li><a class="dropdown-item" href="#">Verduras/Legumes</a></li>
              <li><a class="dropdown-item" href="#">Folhagens</a></li>
              <li><a class="dropdown-item" href="#">Raízes/Tubérculos</a></li>
            </ul>
          </li>
        </ul>
        <div class="align-self-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="cadastrar.php" class="nav-link text-white">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a href="entrar.php" class="nav-link text-white">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="carrinho.php" class="nav-link text-white">
                <svg class="bi" width="24" height="24" fill="currentColor">
                  <use xlink:href="bi.svg#cart3" />
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
      <div class="row justify-content-center">
        <form action="config/login.php" method="POST" class="col-sm-12 col-md-8 col-lg-6">
          <h1 class="mb-3">Identifique-se, por favor</h1><?php if (isset($_SESSION['nao_autenticado'])){ ?><div class="alert alert-danger"><b>E-mail</b> ou <b>senha</b> incorreta.</div><?php } unset($_SESSION['nao_autenticado']);?>
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" autofocus id="txtEmail" placeholder=" " value="<?php if (isset($_SESSION['email_digitado'])){echo$_SESSION['email_digitado'];} unset($_SESSION['email_digitado']) ?>" />
            <label for="txtEmail">E-mail</label>
          </div>
          <div class="form-floating mb-3">
            <input name="senha" type="password" class="form-control" autofocus id="txtSenha" placeholder=" " />
            <label for="txtSenha">Senha</label>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" value="" id="chkLembrar">
            <label for="chkLembrar" class="form-check-label">Lembrar de mim</label>
          </div>
          <button type="submit" class="btn btn-lg btn-primary" type="button">Entrar</button>
          <p class="mb-3 mt-3">Ainda não é cadastrado? <a href="cadastrar.php">Clique aqui</a> para se cadastrar.</p>
          <p class="mb-3">Esqueceu sua senha? <a href="recuperarsenha.php">Cliquei aqui</a> para recuperá-la.</p>
        </form>
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
</body>

</html>