<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Compras</title> 

	<link rel="stylesheet" type="text/css" href="principal.css">
  <link rel="stylesheet" type="text/css" href="musica2.css">
  <link rel="icon" href="img/icone.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
<body style="background-color: rgba(0, 0, 0,0.05);">

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


  <h1 style="margin-top: 70px;"><center>Compras</center></h1>

  <form name="form_produtos" id="form_produtos" method="post" action="compras.php" novalidate enctype="multipart/form-data">
 
   <div class="accordion" id="accordionExample" style="width: 100%;">
  <div class="card" style="background: transparent; border: none;">
    <div class="card-header"  id="headingTwo" style="background: transparent; border: none; padding-bottom: 0px;">
      <h5 class="mb-0">
        <button style="font-size: 28px;" class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Filtros de busca</button>
      </h5>
    </div>
    <div id="collapseTwo" style="border-spacing: 0px;" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body" style="margin-left: 7px ; margin-right: 7px; ">
       <div style="justify-content: space-around; display: flex;">

 <div class="dropdown"> 
  <select class="bfiltro" name="preco" id="select" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <option value="!= 0">Todos os preços</option>
    <option value="<= 500">Até R$ 500,00</option>
    <option value=">= 500 and preco <=1000">R$ 500,00 a R$ 1000,00</option>
    <option value=">= 1000 and preco <=2000">R$ 1000,00 a R$ 2000,00</option>
    <option value=">= 2000">Mais de R$ 2000,00</option>
  </select>
</div>
       
<div class="dropdown">
  <select class="bfiltro" name="categoria" id="select" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <option value="!= 0">Todas as categorias</option>
    <option value="= 1">Gamer</option>
    <option value="= 2">Escritório</option>
    <option value="= 3">Decorativas</option>
    <option value="= 4">Para sala</option>
    <option value="= 5">Jantar</option>
  </select>
</div>
       
<div class="dropdown">
  <select class="bfiltro" name="material" id="select" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <option value="!= 0">Todos os materiais</option>
    <option value="= 1">Couro</option>
    <option value="= 2">Madeira</option>
    <option value="= 3">Ferro</option>
    <option value="= 4">Plástico</option>
    <option value="= 5">Acrílico</option>
  </select>
</div>
</div>
<div style="width: 100%; margin-top: 8px; "> 
  <button style="font-size: 28px; width: 100%" type="submit" name="filtrar" class="btn btn-primary ">Filtrar</button>
</div>
</div>

       </div>
        </table>
      </div>
    </div>
  </div>


<?php

include("mysql.php");
mysqli_set_charset($conexao, "utf8");


if (isset($_POST['filtrar'])) {
    $sql = "select * from cadeiras 
    where preco ".$_POST['preco']." and id_categoria ".$_POST['categoria']." and id_material ".$_POST['material'];     
}


?>


     <style type="text/css">

.option{
  padding: 0px;
  margin-right: 40px;
}

.preco{
  font-size: 20px;
 }

.bfiltro{
  font-size: 23px;
  padding: 5px 130px;
  cursor: pointer;
  border:1px solid black;
  background:none;
  outline:none;
  position: relative;
  background-color: rgba(110, 123, 139);

}

.opcao{
  width: 100%;
  font-size: 23px;
  display:block;
  cursor: pointer;
  border:1px solid black;
  background:none;
  outline:none;
  background-color: rgba(110, 123, 139);
}

.bfiltro:hover{

}

  .row{
    display:-ms-flexbox; display:flex; -ms-flex-wrap:wrap; flex-wrap:wrap; margin-right: 5px; margin-left: 5px;
  }

  .card-img-top{
    border-top-left-radius:calc(.25rem - 1px);
    border-top-right-radius:calc(.25rem - 1px); 
    max-width:280px;
    width: 100px;
    max-height:230px;
    min-height:230px;
    height: auto;
    width: auto;
  }

  .card-body{
    -ms-flex:1 1 auto;flex:1 1 auto;padding:1.0rem
    }.

    .a{
      text-decoration: none;
      color: black;
    }

.a:hover{
  text-decoration: none;
}

  </style>
  <br>

   <div class="row" style="margin-right: 67px; margin-left: 67px;">
     
     <?php
       include("mysql.php");
       mysqli_set_charset($conexao, "utf8");

       $r = mysqli_query($conexao, $sql);

       while ($linha = mysqli_fetch_assoc($r))
        { 

     ?>


    <a class="a" title="Adicionar no carrinho" href="carrinho.php?codigo=<?php echo $linha['codigo'];?>"><div class="col-sm" style="margin-left: 15px;">
       <div class="card" style="width: 300px; min-height: 400px; background-color: white; border-top-color: transparent; border-bottom-color: transparent; border-left-color: rgba(0,0,0,0.3); border-right-color: rgba(0,0,0,0.3);">
         <center><img src="img_bd/<?php echo $linha['img'];?>" class="card-img-top" alt="erro ao carregar a imagem"></center>  

        <div class="card-body">
          
          <h4 class="card-title" style="color: #666666; font-size: 22px;"><?php if (strlen($linha['nome']) >= 50) { echo substr($linha['nome'], 0, 50).'...'; } else echo $linha['nome']; ?></h4>
          <div style="position: absolute; bottom: 25px;">
          <p class="card-text" style="color: #333333; font-size: 20px;">R$ <?php echo number_format($linha['preco'], 2);?></p>
          </div>
        </div>
      </div></a>

     <br>
   </div>
    <?php
      }
    ?>
  </div> 
  </form>
<script src="principal_js.js"></script>
<script src="musica.js"></script>
</body>
</html>