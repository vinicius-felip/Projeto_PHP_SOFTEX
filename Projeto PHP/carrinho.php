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
              <a href="cadastro.php" class="nav-link text-white">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link text-white">Entrar</a>
            </li>
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
      <ul class="list-group mb-3">
        <li class="list-group-item py-3">
          <div class="row g-3">
            <div class="col-4 col-md-3 col-lg-2">
              <a href="#">
                <img src="img/produtos/000001.jpg" class="img-thumbnail">
              </a>
            </div>
            <div class="col-8 col-md-9 col-lg-8 col-xl-8 text-left align-self-center">
              <h4><b><a href="#" class="text-decoration-none text-primary">Banana Prata</a></b></h4>
            </div>
            <div class="col-6 offset-6 col-sm-4 offset-sm-6 cold-md-4 offset-md-8 col-lg-2 offset-lg-0 align-self-center mt-3">
              <div class="input-group">
                <button type="button" class="btn btn-outline-primary btn-sm">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use xlink:href="bi.svg#caret-down"></use>
                  </svg>
                </button>
                <input type="text" class="form-control text-center border-primary" value="0">
                <button type="button" class="btn btn-outline-primary btn-sm">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use xlink:href="bi.svg#caret-up"></use>
                  </svg>
                </button>
                <button type="button" class="btn border-primary btn-outline-danger btn-sm">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use xlink:href="bi.svg#trash"></use>
                  </svg>
                </button>
              </div>
              <div class="text-end mt-2">
                <small class="text-secondary">Valor Kg: R$ 4,99</small><br>
                <span class="text-dark">Valor Item: R$ 9,98</span>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item py-3">
          <div class="text-end">
            <h4 class="text-dark mb-3">Valor Total: R$ 9,98</h4>
            <a href="index.php" class="btn btn-outline-success btn-lg">Continuar Comprando</a>
            <button class="btn btn-primary btn-lg">Fechar Compra</button>
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