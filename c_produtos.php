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
<center>
<div>

	<?php
	if (isset($_GET['codigo'])) {
			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");

			$sql = "select * from caderias where codigo = ".$_GET['codigo'];
			$r = mysqli_query($conexao, $sql);
			$linha = mysqli_fetch_assoc($r);

			$codigo = $linha['codigo'];
			$nome = $linha['nome'];
			$preco = $linha['preco'];
			$descricao = $linha['descricao'];
			$id_categoria = $linha['id_categoria'];
			$id_material = $linha['id_material'];
		}
		else {
			$codigo = "0";
			$nome = "";
			$preco = "";
			$descricao = "";
			$id_categoria = "0";
			$id_material = "0";
      }
	?>

<form name="form_cadastro" id="form_cadastro" method="post" action="c_produtos_bd.php" novalidate enctype="multipart/form-data">
	
	<h1>Cadastro</h1>

    <input class="esconder" type="text" name="codigo" id="codigo" readonly="true" value="0">
	<input type="text" name="nome" id="nome" placeholder="Nome" maxlength="100">
	<input type="text" name="preco" id="preco" placeholder="Preço" maxlength="30">
	<input type="text" name="descricao" id="descricao" placeholder="Descrição" maxlength="400">
	<select name="id_categoria" id="id_categoria" class="form-control" style="width:200px;">

		<?php
					include("mysql.php");
					mysqli_set_charset($conexao, "utf8");

					$sql = "select * from categorias";
					$r = mysqli_query($conexao, $sql);

while ($linha = mysqli_fetch_assoc($r)) {

	if ($id_categoria == $linha['codigo'])
		echo "<option value=".$linha['codigo']." selected>".$linha['nome']."</option>";
	else		
		echo "<option value=".$linha['codigo'].">".$linha['nome']."</option>";
	
}

				?>				
			</select>
	<select name="id_material" id="id_material" class="form-control" style="width:200px;">

		<?php
					include("mysql.php");
					mysqli_set_charset($conexao, "utf8");

					$sql = "select * from material";
					$r = mysqli_query($conexao, $sql);

while ($linha = mysqli_fetch_assoc($r)) {

	if ($id_material == $linha['codigo'])
		echo "<option value=".$linha['codigo']." selected>".$linha['nome']."</option>";
	else		
		echo "<option value=".$linha['codigo'].">".$linha['nome']."</option>";
	
}

				?>				
			</select>
	<input style="background-color: rgba(255, 250, 250, 0.01);" type="file" name="img" id="img" class="custom-file-input">
	<br>
	<input type="submit" name="cadastrar" value="Cadastrar" class="botao">
	<br>
	<strong><a class="volta" href="principal.php">Voltar para tela inicial>></a></strong>

</form>
</div>
</center>


</body>
</html>