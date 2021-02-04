<?php
define('HOST','localhost');
define('USUARIO','root');
define('SENHA', '')    ;
define('DB','feirapernambucana');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('AAAAAAAAAAAAAAERROR');