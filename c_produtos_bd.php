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
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$id_categoria = $_POST['id_categoria'];
	$id_material = $_POST['id_material'];

  $extensao = strtolower(substr($_FILES['img']['name'], -4));
  $arquivo = time().$extensao;
  $diretorio = "img_bd/";

  move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$arquivo);
		

	if ($nome == "" || $preco == "" || $descricao == "" || $id_categoria == "0" || $id_material == "0"){
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; 
        echo "<center><a>Preencha os campos faltantes.</a></center>";
		echo "<center><p><a class='volta' href='c_produtos.php'>Login</a></p></center>";
		exit;
	}


    if ($codigo == 0)
	$sql = "insert into cadeiras values ($codigo, '$nome', $preco, $id_material, $id_categoria, '$arquivo','$descricao')";

    else 
    	$sql = "update caderias 
	            set nome = '$nome',
	            preco = $preco, 
	            id_material = $id_material,
	            id_categoria = $id_categoria,
	            img = $arquivo,
	            descricao = '$descricao'; 
	            where codigo = $codigo";

	$r = mysqli_query($conexao, $sql);

	if ($r == false){
		echo "Ops! Ocorreu um erro inesperado. Tente novamente mais tarde";
		exit;
	}

	header("location: c_produtos.php");

?>

</body>
</html>