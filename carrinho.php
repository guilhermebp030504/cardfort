<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carrinho</title>

	<link rel="stylesheet" type="text/css" href="principal.css">
  <link rel="stylesheet" type="text/css" href="musica2.css">
  <link rel="icon" href="img/icone.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>

	<?php 

session_start();

if (isset($_SESSION['logado']) == false) 
  {      
?>

<style type="text/css">

  
.erro {
     color: black; 
}

.erro:hover{ 
  color: black;
  text-decoration: none;
}

.erro:active{
  color: black;
  text-decoration: none;
}

h5, p{
  font-family: system-ui, -apple-system;
}

main{
  filter: blur(10px);
}

</style>

<div class="modal" tabindex="-1" id="erro" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Falha na verificação do Login</h5>
        </button>
      </div>
      <div class="modal-body">
        <p>Parece que você está tentando entrar no site de formas não tradicionais. Realize o Login e entre novamente.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a class="erro" href="login.php">Tela de Login</a></button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#erro').modal('show');
  });  
</script>

?>


<?php
}
?>

<!--  Tela de erro  -->

<?php

if (isset($_SESSION['logado']) == true){
  include("mysql.php");
  mysqli_set_charset($conexao, "utf8");

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
    $_SESSION['senha'] = $linha['senha'];

    $usuario = $_SESSION['usuario'];
    $senha = $_SESSION['senha'];

  }

?>

<!--  Modal Perfil  -->
   
  <div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(255, 165, 0, .2); border: none;">
        <h5 style="font-size: 35px;"class="modal-title" id="TituloModalCentralizado">Perfil do Usuário</h5>
        <button type="button" style="background-color: rgba(255, 250, 250, .001); border: none; padding-top: 10px;"  data-dismiss="modal" aria-label="Fechar"><img style="width: 30px; height: 30px; cursor: pointer;" src="img_bd/fechar.png">
        </button>
      </div>
      <div id="modal-body">
    <div style="background-color: rgba(255, 165, 0, .2); height: 280px;">
    <center>

 <?php 

  include("mysql.php");
  mysqli_set_charset($conexao, "utf8");

  $sql = "select foto from cadastro 
          where codigo = $cod
          "; 

  $r = mysqli_query($conexao, $sql);
  $t = mysqli_num_rows($r);
  $linha = mysqli_fetch_assoc($r);

  $_SESSION['foto'] = $linha['foto'];
  $foto = $_SESSION['foto'];
  
  if($_SESSION['foto'] == 0){

    echo "<img src='img_bd/pefil.png' style=' background-color: #fff;padding: 10px; border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 10px;'>";
}

if($_SESSION['foto'] != 0){

    echo "<img src='img_bd/$foto' style=' background-color: #fff;padding: 10px; border-radius: 50%; border: double; width: 200px; height: 200px; margin-top: 10px;'>";
}
?>

  </center>
  <center><p style="margin-top: 10px; font-size: 26px; line-height: 0.9;"><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?><br><strong><?php echo $_SESSION['usuario'] ;?>#<?php echo $_SESSION['codigo'];?></strong></p></center>
  </div>
  <div style="background-color: rgba(255, 165, 0, .3); height: 100px;">
  <p style="padding-top: 30px; padding-left: 5px; font-size: 24px;"><img src="img_bd/email.png" style="height: 30px; width: 30px;"> <?php echo $_SESSION['email'];?></p>
  </div>
  </div>    
      <div style="justify-content: space-between;" class="modal-footer">
        <a href="edt_perfil.php"><button style="padding-left: 3px;" type="button" class="btn btn-secondary"><img style="width: 20px; height: 23px; padding-bottom: 3px;" src="img_bd/confg.png"> Editar Perfil</button></a>
        <a href="logout.php"><button type="button" style="background-color: rgba(255, 250, 250, .001); border: none;" ><img style="width: 30px; height: 40px; cursor: pointer;" src="img_bd/sai.png"></button></a>
      </div>
    </div>
  </div>
</div>

<!--  Modal Perfil  -->

<!-- Musica -->

<div class="modal fade" id="musicaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"  style="background-color: rgba(220,220,220,0.01); border-color: rgba(220,220,220,0.01); ">
      <div class="modal-body mb-0 p-0">

        <div class="player">
      <canvas></canvas>
    <div class="song">
      <div class="artist">Lo-fi</div>
      <div class="name">NOGYMX - bikes at the pier</div>
    </div>
    <div class="playarea">
      <div class="prevSong"></div>
      <div class="play"></div>
      <div class="pause"></div>
      <div class="nextSong"></div>
    </div>
    <div class="soundControl"></div>
    <div class="time">00:00</div>
  </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
</script>
<style type="text/css">
  
</style>

<!-- Musica -->

</head>
<body>

<header style="position: fixed; top: 0px; width: 100%; z-index: 1;">
    <nav id="principal">
      <a id="principal" href="principal.php" class="logo">Cardfort</a>

 <form name="form_busca" id="form_busca" method="post" action="compras.php">      
      <div style="margin-top: 7px;" id="divBusca">

         <?php
  $sql = "select nome from cadeiras";
  $r = mysqli_query($conexao, $sql);
  $dados = mysqli_fetch_array($r);
  ?>


        <input class="barra" style="margin-bottom: 5px;" name="bb" id="bb" list="cad" placeholder="Buscar..."/>
        <datalist id="cad">
      <?php
      foreach ($r as $dados) {

    echo "<option value='".$dados['nome']."'>";
      }

      ?>
 </datalist> 

        <button type="submit" name="buscar" id="buscar" style=" font-size: 25px;background-color: transparent; border: none; cursor: pointer;">🔎</button>   
     </div>
       </form>

<?php

include("mysql.php");
mysqli_set_charset($conexao, "utf8");


if (isset($_POST['buscar'])) {

  
    $sql = "select * from cadeiras";
      if (empty($_POST['bb']) == false)
        $sql = $sql." where nome like '%".$_POST['bb']."%'";
}

else if (isset($_POST['1'])) {

  
    $sql = "select cadeiras.codigo, cadeiras.nome, cadeiras.preco, cadeiras.id_material, cadeiras.id_categoria, cadeiras.img, cadeiras.descricao from cadeiras
            left join categorias on (categorias.codigo = id_categoria)";
      if (empty($_POST['1']) == false)
        $sql = $sql." where categorias.codigo =".$_POST['1'];
}

else if (isset($_POST['2'])) {

  
    $sql = "select cadeiras.codigo, cadeiras.nome, cadeiras.preco, cadeiras.id_material, cadeiras.id_categoria, cadeiras.img, cadeiras.descricao from cadeiras
            left join categorias on (categorias.codigo = id_categoria)";
      if (empty($_POST['2']) == false)
        $sql = $sql." where categorias.codigo =".$_POST['2'];
}

else if (isset($_POST['3'])) {

  
    $sql = "select cadeiras.codigo, cadeiras.nome, cadeiras.preco, cadeiras.id_material, cadeiras.id_categoria, cadeiras.img, cadeiras.descricao from cadeiras
            left join categorias on (categorias.codigo = id_categoria)";
      if (empty($_POST['3']) == false)
        $sql = $sql." where categorias.codigo =".$_POST['3'];
}

else if (isset($_POST['4'])) {

  
    $sql = "select cadeiras.codigo, cadeiras.nome, cadeiras.preco, cadeiras.id_material, cadeiras.id_categoria, cadeiras.img, cadeiras.descricao from cadeiras
            left join categorias on (categorias.codigo = id_categoria)";
      if (empty($_POST['4']) == false)
        $sql = $sql." where categorias.codigo =".$_POST['4'];
}

else if (isset($_POST['5'])) {

  
    $sql = "select cadeiras.codigo, cadeiras.nome, cadeiras.preco, cadeiras.id_material, cadeiras.id_categoria, cadeiras.img, cadeiras.descricao from cadeiras
            left join categorias on (categorias.codigo = id_categoria)";
      if (empty($_POST['5']) == false)
        $sql = $sql." where categorias.codigo =".$_POST['5'];
}

else{
   $sql = "select * from cadeiras";
}

?>

      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
  
        <li style="margin-top: 25px;"><a id="principal"  href="principal.php">Inicio</a></li>
        <li style="margin-top: 25px;"><a id="principal" data-toggle="modal"  href="#perfil">Perfil</a></li>
        <li style="margin-top: 25px;"><a id="principal"  href="compras.php">Compras</a></li>
        <li><a id="principal" href="carrinho.php"><img style="height: 30px; width: 40px; filter: invert(100%);" src="img_bd/carrinho.png"></a></li>
        
        <li><a id="principal"  data-toggle="modal"  href="#musicaModal"><img style="height: 40px; width: 40px;" src="img_bd/mus.png"></a></li>

        <?php
          
          if (md5($usuario) == 'b09c600fddc573f117449b3723f23d64' && md5($senha) == 'b09c600fddc573f117449b3723f23d64') {

            echo "<li style='margin-top: 25px;''><a id='principal'  href='c_produtos.php'>Cadastro</a></li>";
        
          }

        ?>

      </ul>
    </nav>
  </header>

	<style type="text/css">
		
		.card-img-top{
    border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px); 
    max-width:250px;
    max-height:250px;
    min-height:250px;
    height: auto;
    width: auto;
}

.p{
	font-size: 21px;
  padding-left: 10px;
}

.p1{
  padding-left: 10px;
}

.cab{
  background-color: white;
  width: 70vw;
  min-width: 70vw;
  border: none;
  margin-top: 10px;
  margin-left: 10px;
  margin-bottom: 10px;
  margin-right: 10px; 
}

.tit{
  line-height: 0.5;
}

.tab{
	display: flex;
	width: 65vw;
  margin-left: 2.5vw;
	border: solid 1px #ddd;
  border-left: none;
  border-right: none; 
  padding: 10px; 
}

.tab2{
  margin-bottom: 100px;
	display: block;
	width: 38vw;
}
	</style>

	<table width="100%" style="margin-top: 60px; width: 100vw; height: 100vh; overflow-x: hidden; background-color: rgba(0, 0, 0,0.05);">

		<td width="70%" style="width: 50vw;">

	<?php

  echo "<div class='cab'>";

echo "<p class='tit' style='padding-top: 35px; padding-left: 2.5vw; font-size: 30px;'>Carrinho de compras</p>";
echo "<p class='tit' style='text-align: right; padding-right: 3.5vw; font-size: 18px;'>Preço</p>";

       if(isset($_SESSION['itens']) == false){
       	$_SESSION['itens'] = array();
       }
       
       if (isset($_GET['codigo'])) {
      
      $produtos = $_GET['codigo'];
       
       if(isset($_SESSION['itens'][$produtos]) == false){
       		$_SESSION['itens'][$produtos] = 1;
       }
       else {
       	$_SESSION['itens'][$produtos] += 1;
       }
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=carrinho.php'>";
   }



       if (count($_SESSION['itens']) == 0){
       	echo "<center style='font-size:25px;'>Carrinho vazio";
       	echo "<br>";
       	echo "<a href='compras.php'>Adicionar Produtos</a></center>";
       }
       else {
       	include("mysql.php");
       	mysqli_set_charset($conexao, "utf8");
       }
	?>

		<?php

		$total = 0;

		foreach ($_SESSION['itens'] as $produtos => $quantidade) {

			$sql = "select * from cadeiras
			        where codigo = " .$produtos;

			$resultado = mysqli_query($conexao, $sql);
			$linha = mysqli_fetch_assoc($resultado);

echo "<div class='tab'>";
      
			echo "<img src='img_bd/".$linha['img']." ' class='card-img-top' alt='erro ao carregar a imagem'>";
      echo "<table width='100%'>";
      echo "<td width='75%'>";
			echo "<div class='tab2'><p class='p'>".$linha['nome']."</p>";
			echo "<p class='p1'> Qtd: ".$quantidade."</p>";
      echo "<p class='p1'><a href='remover.php?codigo=" .$linha['codigo']. "'>Remover</a></p>";
      echo "</td>";
      echo "<td width='25%'>";
      echo "<p style='margin-bottom: 230px; text-align: right; font-weight: bold; font-size:21px;'>R$: ".number_format($linha['preco'], 2)."</p>";
      echo "</td></div>";
      echo "</table>";


			echo "</div>";

      

			$total = $total +($quantidade * $linha['preco']);
		}

		$_SESSION['total'] = $total;
    echo "</div>";


		?>
		
	</td>
   <td width="30%" style="position: fixed; margin-top: 10px; width: 30vw;">
   	<div style="background-color: white; margin-left: 30px; width: 80%; padding-top: 10px;">
	<center><h4>Total do Carrinho: R$ <?php echo number_format($total, 2); ?></h4></center>
	<br>
	<center><a href="compras.php" style="font-size: 20px;">Continuar Adicionando</a></center>
  <?php
  if ($total > 0) {
  echo "<center><a href='img/boleto.jpg' download style='font-size: 20px;'>Download do Boleto</a></center>";
}
  ?>
	</div>
</td>
</table>
<script src="principal_js.js"></script>
<script src="musica.js"></script>
</body>
</html>