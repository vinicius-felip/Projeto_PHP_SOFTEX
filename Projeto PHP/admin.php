<?php
#include_once('config/verificarlogin.php');
include_once('config/conexao.php');

if (isset($_POST['nome'])) {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  move_uploaded_file($_FILES['foto']['tmp_name'],"img/produtos/".$_FILES['foto']['name']);
  $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
  $detalhe = mysqli_real_escape_string($conexao, $_POST['detalhe']);
  $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
  $foto = mysqli_real_escape_string($conexao,$_FILES['foto']['name']);


  $sql = "INSERT INTO produto (categoria, nome, detalhe, preco, foto) VALUES ('$categoria', '$nome', '$detalhe', '$preco', '$foto')";
    if ($conexao->query($sql) === TRUE) {
      header('Location: admin.php?sucesso=');
      $conexao->close();
    } else {
      echo "Error: " . $sql . "<br>" . $conexao->error;
      echo "<a href='../cadastrar.php'>Voltar para a pagina de cadastro</a>";
    
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
  <title>Feira PERNAMBUCANA</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
  <link rel="shortcut icon" href="img/favicon/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script type="text/javascript">
    setTimeout(function() {
      document.getElementById("sucesso").style.display = "none";
    }, 1500);

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

<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark border-bottom shadow-sm mb-3 sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/pernambuco-alfabeto-f.png" alt="FeiraPERNAMBUCANA" width="35px" style="margin-right: 8px" /><strong>Feira PERNAMBUCANA </strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="align-self-end text-white">
        <legend>ADMIN</legend>
      </div>
    </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <?php if (isset($_GET['sucesso'])) { ?>
        <div id=sucesso class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sucesso!</strong> As informações foram enviadas para o banco de dados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
      <div class="grid pb-3 mt-3">
        <legend class="text-uppercase">Insira os dados do produto</legend>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-3 form-group ">
            <label for="formGroupExampleInput">Categoria</label>
            <select  name="categoria" class="form-select form-control" id="formGroupExampleInput" placeholder="">
              <option value="frutas">Frutas</option>
              <option value="verduras/legumes">Verduras/Legumes</option>
              <option value="folhagens">Folhagens</option>
              <option value="raizes/tuberculos">Raízes/Tubérculos</option>
            </select>
          </div>
          <div class="col-3 form-group">
            <label for="formGroupExampleInput2">Nome do produto</label>
            <input  name="nome" type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
          </div>
          <div class="col-3 form-group ">
            <label for="formGroupExampleInput">Descrição do produto</label>
            <input  name="detalhe" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          <div class="col-3 form-group pb-3">
            <label for="formGroupExampleInput2">Preço</label>
            <input  name="preco" type="number" step="any" class="form-control" id="formGroupExampleInput2" placeholder="">
          </div>
          <div class="custom-file pb-3">
            <input  name="foto" type="file" class="custom-file-input" id="customFile" >
            <label class="custom-file-label" for="customFile"></label>
          </div>
          <button type="submit" class="btn btn-dark">Enviar</button>
        </form>
      </div>
    </div>
  </main>
</body>

</html>