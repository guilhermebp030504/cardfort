<?php

	include("mysql.php");
	mysqli_set_charset($conexao, "utf8");
	session_start();

	$sql = "select * from cadastro 
	        where codigo = 1
	        "; 

	$r = mysqli_query($conexao, $sql);

	$t = mysqli_num_rows($r);

if ($t != 0) {
		$linha = mysqli_fetch_assoc($r);

		$_SESSION['codigo'] = $linha['codigo'];
		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['sobrenome'] = $linha['sobrenome'];
		$_SESSION['email'] = $linha['email'];
		$_SESSION['usuario'] = $linha['usuario'];

		header("location: perfil.php");

	}

?>