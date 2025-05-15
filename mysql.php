<?php

	$conexao = mysqli_connect("localhost:3306", "root", "root", "cardfort");

	if ($conexao == false){
		die("Erro ao conectar ao MySQL... Por favor, verifique as configurações...");
	}

?>