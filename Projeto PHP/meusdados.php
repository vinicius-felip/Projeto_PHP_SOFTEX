<?php
session_start();
if (!$_SESSION['email']){
    header('Location: entrar.php');
    exit();
}

require('config/conexao.php');
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM `usuario` WHERE `usuario_id` = '$usuario_id'";
$result = $conexao->query($sql) or die('EWRRRO');
$dados = mysqli_fetch_assoc($result);

if (isset($_GET['alterar'])) {
  if ($_GET['alterar'] == 'dados') {
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $sql = "SELECT usuario_id from usuario where email = '$email'";
    $result = mysqli_query($conexao, $sql);
    $qntemail = mysqli_num_rows($result);
    if ($qntemail == 1) {
      if (intval($id['usuario_id'] = $result->fetch_assoc()) != $usuario_id) {
        $_SESSION['email_existe'] = true;
        header('Location: meusdados.php');
        exit;
      }
    }
    $sql = "UPDATE `usuario` SET `email` = '$email', `telefone` = '$telefone' WHERE `usuario_id` = '$usuario_id'";
    $result = $conexao->query($sql) or die('EWRRRO');
    $_SESSION['dados_atualizado'] = true;
    header("Location: meusdados.php");
    exit;
  }
  if ($_GET['alterar'] == 'endereco') {
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
    $referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));

    $sql = "UPDATE `usuario` SET `cep` = '$cep', `endereco` = '$endereco', `numero` = '$numero', `complemento` = '$complemento', `referencia` = '$referencia' WHERE `usuario_id` = '$usuario_id'";
    $result = $conexao->query($sql) or die('EWRRRO');
    $_SESSION['dados_atualizado'] = true;
    header("Location: meusdados.php");
    exit;
  }
  if ($_GET['alterar'] == 'senha') {
    $senhaAntiga = mysqli_real_escape_string($conexao, trim(md5($_POST['senhaAntiga'])));
    $novasenha = mysqli_real_escape_string($conexao, trim(md5($_POST['novaSenha'])));
    $confsenha = mysqli_real_escape_string($conexao, trim(md5($_POST['confSenha'])));

    $sql = "SELECT senha from usuario where usuario_id = '$usuario_id' and senha = '$senhaAntiga'";
    $result = $conexao->query($sql) or die('EWRRRO');
    $dado = $result->fetch_assoc();
    if (mysqli_num_rows($result) == 1) {
      if ($novasenha != $confsenha) {
        $_SESSION['senha_dif'] = true;
        header("Location: meusdados.php");
        exit;
      }
      $sql = "UPDATE `usuario` SET `senha` = '$novasenha' WHERE `usuario_id` = '$usuario_id'";
      $result = $conexao->query($sql) or die('EWRRRO');
      $_SESSION['dados_atualizado'] = true;
      header("Location: meusdados.php");
      exit();
    } else {
      $_SESSION['senha_incorreta'] =  true;
      header("Location: meusdados.php");
      exit();
    }
  }
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
  <script type="text/javascript">
    setTimeout(function() {
      document.getElementById("sucesso").style.display = "none";
    }, 3000);

    function hide() {
      document.getElementById("sucesso").style.display = "none";
    }
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
      <?php if (isset($_SESSION['dados_atualizado'])) { ?>
        <div id=sucesso class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sucesso!</strong> Seus dados foram atualizados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['dados_atualizado']);
      } ?>
      <?php if (isset($_SESSION['email_existe'])) { ?>
        <div id=sucesso class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Falha ao atualizar!</strong> E-mail já está sendo utilizado.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['email_existe']);
      } ?>
      <?php if (isset($_SESSION['senha_dif'])) { ?>
        <div id=sucesso class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Falha ao atualizar!</strong> Nova senha não coincide.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['senha_dif']);
      } ?>
            <?php if (isset($_SESSION['senha_incorreta'])) { ?>
        <div id=sucesso class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Falha ao atualizar!</strong> Senha atual incorreta.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['senha_incorreta']);
      } ?>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active " id="home-tab" data-bs-toggle="tab" href="#first-tab" role="tab" aria-controls="home" aria-selected="true">Meus Dados</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#second-tab" role="tab" aria-controls="profile" aria-selected="false">Meu Endereço</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="messages-tab" data-bs-toggle="tab" href="#third-tab" role="tab" aria-controls="messages" aria-selected="false">Alterar Senha</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active in" id="first-tab">
          <form action="meusdados.php?alterar=dados" method="post">
            <div class="box-info">
              <header>
                <h3 class="title-box-info ico-user">
                  Dados Pessoais
                  <small>Cliente desde: <?php echo $dados['data_cadastro'] ?></small>
                </h3>
                <button type="submit" class="btn bg-primary text-white f-right ico-pencil">Alterar</button>
              </header>
              <div class="box-info-grid row-fluid">
                <div class="col-md-4">
                  <label for="txtNome" class="form-label">Nome Completo <span class="text-danger">*</span></label>
                  <input disabled required name="nome" type="text" class="form-control" value="<?php echo $dados['nome'] ?>" />
                </div>
              </div>
              <div class="box-info-grid">
                <div class="row">
                  <div class="col-md-4">
                    <label for="txtCPF" CPF class="form-label">CPF <span class="text-danger">*</span></label>
                    <input disabled required name="cpf" type="text" class="form-control" value="<?php echo $dados['cpf'] ?>" />
                  </div>
                  <div class="col-md-5">
                    <label for="txtTelefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                    <input required name="telefone" type="tel" class="form-control" placeholder="81940028922" value="<?php echo $dados['telefone'] ?>" />
                  </div>
                  <div class="col-md-1 col-lg-3">
                    <label for="txtDataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                    <input disabled required name="datanascimento" type="date" class="form-control" max="<?php echo date('Y-m-d') ?>" value="<?php echo $dados['data_nascimento'] ?>" />
                  </div>
                </div>
              </div>
              <div class="box-info-grid row-fluid">
                <div class="col-md-4">
                  <label class="form-label">E-mail <span class="text-danger">*</span></label>
                  <input required name="email" type="email" class="form-control" value="<?php echo $dados['email'] ?>" />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane" id="second-tab">
          <form action="meusdados.php?alterar=endereco" method="post">
            <div class="box-info">
              <header>
                <h3 class="title-box-info ico-location">
                  Endereço
                </h3>
                <button type="submit" class="btn bg-primary text-white f-right ico-pencil">Alterar</button>
              </header>
              <div class="box-info-grid row-fluid">
                <div class="col-md-4">
                  <label for="txtNome" class="form-label">Endereço <span class="text-danger">*</span></label>
                  <input readonly required name="endereco" type="text" class="form-control" id="textEndereco" value="<?php echo $dados['endereco'] ?>" />
                </div>
              </div>
              <div class="box-info-grid">
                <div class="row">
                  <div class="col-md-3 ">
                    <label for="txtCPF" CPF class="form-label">CEP <span class="text-danger">*</span></label>
                    <input required name="cep" type="text" class="form-control" id="textCEP" value="<?php echo $dados['cep'] ?>">
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Número <span class="text-danger">*</span></label>
                    <input id="txtNumero" required name="numero" type="text" class="form-control" value="<?php echo $dados['numero'] ?>" />
                  </div>
                  <div class="col-md-7">
                    <label for="txtDataNascimento" class="form-label">Complemento</label>
                    <input name="complemento" type="text" class="form-control" value="<?php echo $dados['complemento'] ?>" />
                  </div>
                </div>
              </div>
              <div class="box-info-grid row-fluid">
                <div class="col-md-4">
                  <label for="txtNome" class="form-label">Referência</label>
                  <input name="referencia" type="text" class="form-control" value="<?php echo $dados['referencia'] ?>" />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane" id="third-tab">
          <form action="meusdados.php?alterar=senha" method="post">
            <div class="box-info">
              <header>
                <h3 class="title-box-info"><svg class="bi" width="36" height="40" fill="currentColor">
                    <use xlink:href="bi.svg#lock-fill"></use>
                  </svg>
                  Alterar Senha
                </h3>
                <button type="submit" class="btn bg-primary text-white f-right ico-pencil">Alterar</button>
              </header>
              <div class="box-info-grid ">
                <div class="row justify-content-md-center">
                  <div class="col-md-5">
                    <label class="form-label">Senha atual</label>
                    <input id="txtNumero" required name="senhaAntiga" type="password" class="form-control" />
                  </div>
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-5">
                    <label class="form-label">Nova senha</label>
                    <input id="txtNumero" required name="novaSenha" type="password" class="form-control" />
                  </div>
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-5">
                    <label class="form-label">Repita a senha</label>
                    <input id="txtNumero" required name="confSenha" type="password" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    </form>
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
  <script type="text/javascript">
    $("#textCEP").focusout(function() {
      //Início do Comando AJAX
      $.ajax({
        //O campo URL diz o caminho de onde virá os dados
        //É importante concatenar o valor digitado no CEP
        url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
        //Aqui você deve preencher o tipo de dados que será lido,
        //no caso, estamos lendo JSON.
        dataType: 'json',
        //SUCESS é referente a função que será executada caso
        //ele consiga ler a fonte de dados com sucesso.
        //O parâmetro dentro da função se refere ao nome da variável
        //que você vai dar para ler esse objeto.
        success: function(resposta) {
          //Agora basta definir os valores que você deseja preencher
          //automaticamente nos campos acima.
          $("#textEndereco").val(resposta.logradouro + ', ' + resposta.bairro + ', ' + resposta.localidade + ' - ' + resposta.uf);
          //Vamos incluir para que o Número seja focado automaticamente
          //melhorando a experiência do usuário
          $("#txtNumero").focus();
        }
      });
    });
  </script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script async="" src="//www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>

</html>