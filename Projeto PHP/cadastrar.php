<?php
session_start();
include_once('config/verificarlogout.php');
?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
  <meta charset="utf-8" />
  <meta name="cadviewport" content="width=device-width, initial-scale=1" />
  <meta name="cadmsapplication-TileColor" content="#da532c" />
  <meta name="cadmsapplication-config" content="img/favicon/browserconfig.xml" />
  <meta name="cadtheme-color" content="#ffffff" />
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
            <li class="nav-item">
              <a href="cadastrar.php" class="nav-link text-white">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a href="entrar.php" class="nav-link text-white">Entrar</a>
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
      <h1>Informe seus dados, por favor</h1>
      <hr />
      <form action="config/signin.php" method="POST">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <fieldset class="row">
              <legend>Dados Pessoais</legend>
              <div class="mb-3">
                <label for="txtNome" class="form-label">Nome <span class="text-danger">*</span></label>
                <input required name="cadnome" type="text" class="form-control" id="txtNome" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadnome'];} unset($_SESSION['cadnome']) ?>" />
              </div>
              <div class="col-md-6 col-xl-5 mb-3">
                <label for="txtCPF" CPF class="form-label">CPF <span class="text-danger">*</span></label>
                <span class="form-text">(somente números)</span>
                <?php if (isset($_SESSION['cpf_existe'])){?>
                  <input name="cadcpf" type="text" class="form-control is-invalid" id="validationServer03" placeholder="" required>
                   <div class="invalid-feedback">
                    CPF já cadastrado.
                  </div><?php } else { ?>
                <input required name="cadcpf" type="text" class="form-control" id="txtCPF" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadcpf'];} unset($_SESSION['cadcpf']) ?>" />
                <?php } unset($_SESSION['cpf_existe']); ?>
              </div>
              <div class="col-md-6 col-xl-4 mb-3">
                <label for="txtDataNascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
                <input required name="caddatanascimento" type="date" class="form-control" id="txtDataNascimento" max="<?php echo date('Y-m-d') ?>" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['caddatanascimento'];} unset($_SESSION['caddatanascimento']) ?>" />
              </div>
            </fieldset>
            <fieldset>
              <legend>Contatos</legend>
              <div class="mb-3 col-md-8">
                <label for="txtEmail" class="form-label">E-mail <span class="text-danger">*</span></label>
                <?php if (isset($_SESSION['email_existe'])){?>
                  <input name="cademail" type="email" class="form-control is-invalid" id="txtEmail validationServer03" placeholder="" required>
                   <div class="invalid-feedback">
                    E-mail já cadastrado.
                  </div><?php } else { ?>
                  <input required name="cademail" type="email" class="form-control" id="txtEmail" placeholder="email@email.com" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cademail'];} unset($_SESSION['cademail']) ?>" /> <?php } unset($_SESSION['email_existe']); ?>

              </div>
              <div class="mb-3 col-md-8">
                <label for="txtTelefone" class="form-label">Telefone <span class="text-danger">*</span></label>
                <input required name="cadtelefone" type="tel" class="form-control" id="txtTelefone" placeholder="81940028922" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadtelefone'];} unset($_SESSION['cadtelefone']) ?>" />
                <span class="form-text">(com DDD, somente números) </span>
              </div>
            </fieldset>
          </div>
          <div class="col-sm-12 col-md-6">
            <fieldset class="row">
              <legend>Endereço</legend>
              <div class="mb-3 col-md-6 col-lg-4">
                <label for="textCEP" class="form-label">CEP <span class="text-danger">*</span></label>
                <span class="form-text">(somente números)</span>
                <div class="input-group">
                  <input required name="cadcep" type="text" class="form-control" id="textCEP">
                  <span class="input-group-text p-1"><i class="bi bi-hourglass-split" style="font-size: 20px;"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3 col-md-6 col-lg-8 align-self-end"> 
                <textarea id="endereco" class="form-control text-muted bg-light" style="height: 68px; resize: none;" disabled >Digite o CEP para buscarmos o endereço.</textarea>
              </div>
              <div class="mb-3 col-md-4">
                <label for="txtNumero" class="form-label">Número <span class="text-danger">*</span></label>
                <input required name="cadnumero" type="text" class="form-control" id="txtNumero" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadnumero'];} unset($_SESSION['cadnumero']) ?>" />
              </div>
              <div class="mb-3 col-md-8">
                <label for="txtComplemento" class="form-label">Complemento</label>
                <input name="cadcomplemento" type="text" class="form-control" id="txtComplemento" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadcomplemento'];} unset($_SESSION['cadcomplemento']) ?>" />
              </div>
              <div class="mb-3">
                <label for="txtReferencia" class="form-label">Referência</label>
                <input name="cadreferencia" type="text" class="form-control" id="txtReferencia" value="<?php if (isset($_SESSION['senha_errada'])){echo$_SESSION['cadreferencia'];} unset($_SESSION['cadreferencia']) ?>" />
              </div>
            </fieldset>
            <fieldset>
              <legend>Senha de Acesso</legend>
              <div class="mb-3">
                <label for="txtSenha" class="form-label">Senha <span class="text-danger">*</span></label>
                <input required name="cadsenha" type="text" class="form-control" id="txtSenha" />
              </div>
              <div class="mb-3">
                <label for="txtConfSenha" class="form-label">Confirme a Senha <span class="text-danger">*</span></label>
                <?php if (isset($_SESSION['senha_errada'])){?>
                  <input required name="cadconfsenha" type="text" class="form-control is-invalid" id="txtConfSenha" />
                   <div class="invalid-feedback">
                    Senhas não coincidem.
                  </div><?php } else { ?>
                <input required name="cadconfsenha" type="text" class="form-control" id="txtConfSenha" />
                <?php } unset($_SESSION['senha_errada']); ?>
              </div>
            </fieldset>
          </div>
        </div>
        <hr>
        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input" value="" id="chkPromocoes">
          <label for="chkPromocoes" class="form-chekc-label">Desejo receber informações sobre promoções.</label>
        </div>
        <div class="mb-3">
          <a class="btn btn-outline-danger" href="index.php">Cancelar</a>
          <input type="submit" value="Criar meu cadastro" class="btn btn-primary">
        </div>
      </form>
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
  <script type="text/javascript">
		$("#textCEP").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
          $("#endereco").val(resposta.logradouro+', '+resposta.bairro+', '+resposta.localidade+' - '+resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#txtNumero").focus();
				}
			});
		});
	</script>
</body>

</html>