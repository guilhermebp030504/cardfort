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
      	color: rgba(60, 179, 113,1);
      	transition: 0.3s;
      }

	</style>
</head>
<body>
<center>
<div>
<form name="form_cadastro" id="form_cadastro" method="post" action="cadastro_bd.php">
	
	<h1>Forneça suas informações</h1>

    <input class="esconder" type="text" name="codigo" id="codigo" readonly="true" value="0">
	<input type="text" name="nome" id="nome" placeholder="Nome" maxlength="20">
	<input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" maxlength="30">
	<input type="email" name="email" id="email" placeholder="Email" maxlength="40">
	<input type="text" name="usuario" id="usuario" placeholder="Nome de usuario" maxlength="16">
	<input type="password" name="senha" id="senha" placeholder="Senha" maxlength="20">
	<br>
	<input type="submit" name="criar" value="Criar" class="botao">
	<br>
	<strong><a class="volta" href="login.php">Voltar para tela inicial>></a></strong>

</form>
</div>
</center>


</body>
</html>