<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="estilo1.css">
	<link rel="icon" href="img/icone.png">

	<script src="cadastro_js.js.js" type="text/javascript"></script>


	<style type="text/css">

		body{
   	background-image: url(img/samambaia.jpg);
   }

		div {
    height: 500px;
	width: 500px;
	margin: 65px auto 150px auto;
      }

      .volta{
      	font-size: 20px;
      	margin-left: 260px;
      	text-decoration: none;
      	color: white;
      	transition: 0.3s;
      }

      .volta:hover{
      	text-decoration: underline;
      	transition: 0.3s;
      }

  .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Selecione uma Foto';
  background-color: rgba(222,184,135,0.5);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 90px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
}

	</style>
</head>
<body>

	<?php

	include("mysql.php");
	mysqli_set_charset($conexao, "utf8");

	session_start();

	$cod = $_SESSION['codigo'];

			$sql = "select * from cadastro where codigo = $cod";
			$resultado = mysqli_query($conexao, $sql);
			$linha = mysqli_fetch_assoc($resultado);

			$nome = $_SESSION['nome'];
			$sobrenome = $_SESSION['sobrenome'];
			$email = $_SESSION['email'];
			$usuario = $_SESSION['usuario'];
			$foto = $linha['foto'];

	?>


<center>
<div>
<form name="form_cadastro" id="form_cadastro" method="post" action="edt_perfil_bd.php" novalidate enctype="multipart/form-data">

	<h1>Editar informações</h1>

    <input class="esconder" type="text" value="<?php echo $cod ;?>" name="codigo" id="codigo" readonly="true" value="0">
	<input type="text" name="nome" value="<?php echo $nome ;?>" id="nome" placeholder="Nome" maxlength="20">
	<input type="text" name="sobrenome" value="<?php echo $sobrenome ;?>" id="sobrenome" placeholder="Sobrenome" maxlength="30">
	<input type="email" name="email" value="<?php echo $email ;?>" id="email" placeholder="Email" maxlength="40">
	<input type="text" name="usuario" value="<?php echo $usuario ;?>" id="usuario" placeholder="Nome de usuario" maxlength="16">
	<input style="background-color: rgba(255, 250, 250, 0.01);" type="file" name="imagem" id="imagem" class="custom-file-input">
	<br>
	<input type="submit" name="Editar" value="Editar" class="botao">
	<br><br><br>
	<strong><a class="volta" href="principal.php">Voltar para tela inicial>></a></strong>

</form>
</div>
</center>


</body>
</html>
