<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil</title>

	<link rel="stylesheet" type="text/css" href="principal.css">
	<link rel="icon" href="img/icone.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <style type="text/css">
  	p{
  		color: black;
  	}

    main#principal {
  background: url("img/prin.jpg") no-repeat center center;
     }
  	

  </style>

</head>

<?php

	include("mysql.php");
	mysqli_set_charset($conexao, "utf8");
	session_start();

  $cod = $_SESSION['codigo'];

	$sql = "select * from cadastro 
	        where codigo = $cod
	        "; 

	$r = mysqli_query($conexao, $sql);

	$t = mysqli_num_rows($r);

		$linha = mysqli_fetch_assoc($r);
    
    $_SESSION['codigo'] = $linha['codigo'];
		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['sobrenome'] = $linha['sobrenome'];
		$_SESSION['email'] = $linha['email'];
		$_SESSION['usuario'] = $linha['usuario'];

?>

<body style="background-color: black;" id="principal">

 <header>
  	<nav id="principal">
  		<a id="principal" href="principal.php" class="logo">Cardfort</a>
  		
  		<div style="margin-top: 7px;" id="divBusca">
        <input class="barra"  type="text" id="bb" placeholder="Buscar..."/>
        <img class="icone" src="img/busca.png"  id="busca" alt="Buscar"/>
        </div>
  		
  		<div class="mobile-menu">
  			<div class="line1"></div>
  			<div class="line2"></div>
  			<div class="line3"></div>
  		</div>
  		<ul class="nav-list">
  			<li><a id="principal"  href="principal.php">Inicio</a></li>
        <li><a id="principal"  href="perfil.php">Perfil</a></li>
  			<li><a id="principal"  href="#">Compras</a></li>
        <li><a id="principal"  href="#"><img style="height: 30px; width: 40px; filter: invert(100%);" src="img_bd/carrinho.png"></a></li>
  		</ul>
  	</nav>
  </header>

  <main id="principal">
    <br><br><br>
  <div id="bloco_perfil">

    <div style="background-color: rgba(255, 165, 0, .2); height: 320px;">

    <center><img src="img_bd/perfil.jpg" style="border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 40px; "></center>
  	
  <center><p style="margin-top: 10px; font-size: 26px; line-height: 0.9;"><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?><br><strong><?php echo $_SESSION['usuario'] ;?>#<?php echo $_SESSION['codigo'];?></strong></p></center>

  </div>
  <div style="background-color: rgba(190, 190, 190, .4); height: 180px;">
  <p><?php echo $_SESSION['email'];?></p>
  </div>
  

  </div>		
  	
  </main>

</body>
</html>