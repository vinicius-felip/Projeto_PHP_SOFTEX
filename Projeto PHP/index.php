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
  <style>
    p.max-3l {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
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
              <li><a class="dropdown-item" href="#">Frutas</a></li>
              <li><a class="dropdown-item" href="#">Verduras/Legumes</a></li>
              <li><a class="dropdown-item" href="#">Folhagens</a></li>
              <li><a class="dropdown-item" href="#">Raízes/Tubérculos</a></li>
            </ul>
          </li>
          <form class="d-flex ms-lg-5 col-5">
            <input class="form-control me-2" type="search" placeholder="Buscar produto" aria-label="Search" />
            <button class="btn btn-outline-primary" type="submit"><i class="bi-search"></i>
            </button>
          </form>
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
  <header class="container">
    <div id="carouselMain" class="carousel carousel-light slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselMain" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselMain" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/slide02.jpg" alt="teste" class="img-fluid w-100" />
        </div>
        <div class="carousel-item">
          <img src="img/slide02.jpg" alt="teste" class="img-fluid w-100" />
        </div>
        <div class="carousel-item">
          <img src="img/slide02.jpg" alt="teste" class="img-fluid w-100" />
        </div>
      </div>
      <a href="#carouselMain" role="button" data-bs-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </a>
      <a href="#carouselMain" role="button" data-bs-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </a>
    </div>
    <hr class="mt-3" />
  </header>

  <main class="mb-5 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
            <form class="ml-3 d-inline-block">
              <select class="form-select form-select-sm">
                <option>Nome</option>
                <option>Crescente</option>
                <option>Decrescente</option>
              </select>
            </form>
            <nav class="d-inline-block">
              <ul class="pagination pagination-sm my-0">
                <li class="page-item">
                  <button class="page-link">1</button>
                </li>
                <li class="page-item">
                  <button class="page-link">2</button>
                </li>
                <li class="page-item">
                  <button class="page-link">3</button>
                </li>
                <li class="page-item">
                  <button class="page-link">4</button>
                </li>
                <li class="page-item">
                  <button class="page-link">5</button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="row g-3 mt-3 mb-3">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000001.jpg" class="card-img-top" />
            <div class="card-header">R$ 2,49</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinhox
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000002.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000003.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000004.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000005.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000006.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000007.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000008.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000009.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000010.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000011.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
          <div class="card text-center bg-light">
            <img src="img/produtos/000012.jpg" class="card-img-top" />
            <div class="card-header">R$ 4,50</div>
            <div class="card-body">
              <h5 class="card-title">Banana Prata</h5>
              <p class="max-3l card-text description">
                Uma palma contém entre 12-16 unidades.
              </p>
            </div>
            <div class="card-footer">
              <form class="d-block">
                <button class="btn btn-outline-primary">
                  Adicionar ao carrinho
                </button>
              </form>
              <small class="text-success">3003,kg em estoque</small>
            </div>
          </div>
        </div>
      </div>
      <div class="row pb-4">
        <div class="col-12">
          <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
            <form class="ml-3 d-inline-block">
              <select class="form-select form-select-sm">
                <option>Nome</option>
                <option>Crescente</option>
                <option>Decrescente</option>
              </select>
            </form>
            <nav class="d-inline-block">
              <ul class="pagination pagination-sm my-0">
                <li class="page-item">
                  <button class="page-link">1</button>
                </li>
                <li class="page-item">
                  <button class="page-link">2</button>
                </li>
                <li class="page-item">
                  <button class="page-link">3</button>
                </li>
                <li class="page-item">
                  <button class="page-link">4</button>
                </li>
                <li class="page-item">
                  <button class="page-link">5</button>
                </li>
              </ul>
            </nav>
          </div>
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
</body>

</html>