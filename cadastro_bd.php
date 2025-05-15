<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Erro</title>

	<link rel="stylesheet" type="text/css" href="estilo1.css">
	<link rel="icon" href="img/icone.png">

	<style type="text/css"> 

		p a{
	font-size: 30px;
	height: 40px; 
	width: 350px;
	margin: 5px;
	padding: 5px 10px;
	text-decoration-color: rgba(60, 179, 113,1);
	color: rgba(60, 179, 113,1);
	width: 500px;
	margin: 150px auto 0px auto; 
}

		a{
	font-size: 35px;
	height: 40px;
	width: 350px;
	margin: 5px;
	padding: 5px 10px;
	color: white;
	width: 500px;
	margin: 150px auto 0px auto; 
}

.volta{
      	text-decoration: none;
      	color: rgba(60, 179, 113,1);
      	transition: 0.3s;
      }

      .volta:hover{
      	text-decoration: underline;
      	color: red;
      	transition: 0.3s;
      }

body{
   	background-image: url(img/samambaia.jpg);
   }

	</style>
</head>
<body>


<?php
 
	include("mysql.php");
	mysqli_set_charset($conexao, "utf8");

	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	if ($usuario == "" || $senha == "" || $nome == "" || $sobrenome == "" || $email == ""){
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; 
        echo "<center><a>Preencha os campos faltantes.</a></center>";
		echo "<center><p><a class='volta' href='cadastro.php'>Login</a></p></center>";
		exit;
	}

	$sql = "insert into cadastro values ($codigo, '$nome', '$sobrenome', '$email', '$usuario', '$senha', '')";

	$r = mysqli_query($conexao, $sql);

	if ($r == false){
		echo "Ops! Ocorreu um erro inesperado. Tente novamente mais tarde";
		exit;
	}

	header("location: login.php")

?>

</body>
</html>