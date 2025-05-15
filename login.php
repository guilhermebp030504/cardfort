<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="estilo1.css">
	<link rel="icon" href="img/icone.png">

	<style type="text/css">
		
   body{
   	background-image: url(img/samambaia.jpg);
   }

	</style>
</head>
<body>

<div>
	<center>
		
<form name="form_login" id="form_login" method="post" action="login_bd.php">

<h1>Realize o seu login</h1>

<input type="number"  class="esconder" name="codigo" id="codigo" readonly="true" value="0">

<input type="text" autocomplete="off" name="usuario" id="usuario" placeholder="Usuario" maxlength="20">
<input type="password" autocomplete="off" name="senha" id="senha" placeholder="Senha" maxlength="20">
<br>

<input type="submit" name="entrar" id="entrar" value="Entrar" onclick="" class="botao">
<br>
<p id="a">Ainda não se cadastrou? Clique em:<a href="cadastro.php" class="a"><strong>Criar conta</strong></a></p>

</form>
	</center>
</div>

</body>
</html>