<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Tela Principal</title>

	<link rel="stylesheet" type="text/css" href="principal.css">
  <link rel="stylesheet" type="text/css" href="musica.css">
	<link rel="icon" href="img/icone.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <style type="text/css">

button, button:focus, button:active{
  border:1px solid black;
  background:none;
  outline:none;
  padding:0;
  border: none;
  font-family: system-ui, -apple-system, Helvetica, Arial, Sans-serif;
}
button span{
  position: relative;
}

  p{
      color: black; 
    }
   
 .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='yellow' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='yellow' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-indicators{
  position:absolute;right:0;bottom:0px;left:0;z-index:15;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;padding-left:0;margin-right:15%;margin-left:15%;list-style:none}

.carousel-indicators li{
  position:relative;-ms-flex:0 1 auto;flex:0 1 auto;width:30px;height:3px;margin-right:3px;margin-left:3px;text-indent:-999px;cursor:pointer;background-color:rgba(255, 215, 0, 0.5)
}

.carousel-indicators li::before{
  position:absolute;top:-10px;left:0;display:inline-block;width:100%;height:10px;content:""
}

.carousel-indicators li::after{
  position:absolute;bottom:-10px;left:0;display:inline-block;width:100%;height:10px;content:""
}

.carousel-indicators .active{background-color:#FFD700}

.modal-content{
  position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;width:100%;pointer-events:auto;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.4);border-radius:.9rem;outline:0;filter: drop-shadow(0 0 0.75rem #feffde);
}

.btn-primary{
  color:#fff;
  background-color:#ffa600;
  border-color:#ffa600;
}
.btn-primary:hover{
  color:#fff;
  background-color:#ff9900;
  border-color:#ff8c00;
}

.btn-primary.focus,.btn-primary:focus{
  box-shadow:0 0 0 .2rem rgba(255, 153, 0,.5);
  }

 </style>

 <!--  Tela de erro  -->

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

</head>
<body style="background-color: black;" id="principal">
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
  		
  		<div class="mobile-menu">
  			<div class="line1"></div>
  			<div class="line2"></div>
  			<div class="line3"></div>
  		</div>
  		<ul class="nav-list">
  
  			<li style="margin-top: 25px;"><a id="principal"  href="principal.php">Inicio</a></li>
        <li style="margin-top: 25px;"><a id="principal" data-toggle="modal"  href="#perfil">Perfil</a></li>
  			<li style="margin-top: 25px;"><a id="principal"  href="compras.php">Compras</a></li>
        <li><a id="principal"  href="carrinho.php"><img style="height: 30px; width: 40px; filter: invert(100%);" src="img_bd/carrinho.png"></a></li>
        
        <li><a id="principal"  data-toggle="modal"  href="#musicaModal"><img style="height: 40px; width: 40px;" src="img_bd/mus.png"></a></li>

        <?php
          
          if (md5($usuario) == 'b09c600fddc573f117449b3723f23d64' && md5($senha) == 'b09c600fddc573f117449b3723f23d64') {

            echo "<li style='margin-top: 25px;''><a id='principal'  href='c_produtos.php'>Cadastro</a></li>";
        
          }

        ?>

  		</ul>
  	</nav>
  </header>
  <main id="principal">
    <br><br><br><br>

<!-- Video Modal do Carrosel -->

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <br><br><br>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body mb-0 p-0">

        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          <iframe style="border-radius: 10px;"s class="embed-responsive-item" src="https://www.youtube.com/embed/1K8vQB5Sqlo"
            allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Video Modal do Carrosel -->

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

    <div class="responsivel" style="width: 1300px; margin: 0px auto 100px auto; padding-top: 10px; filter: drop-shadow(8px 8px 10px gray);">

    <div style="background-color: white;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img_bd/1.png" alt="Primeiro Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img_bd/2.png" alt="Segundo Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img_bd/3.png" alt="Terceiro Slide">
    </div>
    <div class="carousel-item">
      <a href="#videoModal" data-toggle="modal"><img class="d-block w-100" src="img_bd/4.png" alt="Quarto Slide"></a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>
<div>
<a href="https://www.marabraz.com.br/blog/tipos-de-cadeiras-como-escolher-a-ideal-para-cada-ambiente-da-casa/"><img style="margin-left: 92px; width: 1100px; margin-top: 30px;" src="img_bd/baixo.png"></a>
</div>
</div>
<div id="fundocat" >
<div class="responsivel" style="height: 35vh; width: 1300px; margin: 0px auto 150px auto;">
  <br>
 <center><h2 class="categorias">Categorias para explorar</h2></center>
<form name="form_busca" id="form_busca" method="post" action="compras.php">
 <table width="100%">
  <br>
   <tr>
     <th width="15%"><button type="submit" name="1" value="1"><img class="catimg" src="img_bd/cadeira_gamer_1-removebg.png"></button></th>
     <th width="5%"></th>
     <th width="15%"><button type="submit" name="2" value="2"><img class="catimg" src="img_bd/cadeira_escritorio_2-removebg-preview.png"></button></th>
     <th width="5%"></th>
     <th width="15%"><button type="submit" name="3" value="3"><img class="catimg" src="img_bd/8b2f90f21104e711006b2439873f143e-removebg-preview.png"></button></th>
     <th width="5%"></th>
     <th width="15%"><button type="submit" name="4" value="4"><img class="catimg" src="img_bd/4438036_Kit_02_Cadeiras_Para_Sala_de_Jantar_Cozinha_Nik_Canela_Courino_Camel_Gran_Belo_12315107_z-removebg-preview.png"></button></th>
     <th width="5%"></th>
     <th width="15%"><button type="submit" name="5" value="5"><img class="catimg" src="img_bd/a7e85b3217a5dcdb9f7ba4322afcf10f-removebg-preview.png"></button></th>
   </tr>

   <tr>
     <th width="15%"><center><button type="submit" name="1" value="1" class="nome_cat">Cadeira Gamer</button></center></th>
     <th width="5%"></th>
     <th width="15%"><center><button type="submit" name="2" value="2" class="nome_cat">Cadeira de Escritório</button></center></th>
     <th width="5%"></th>
     <th width="15%"><center><button type="submit" name="3" value="3" class="nome_cat">Cadeira Decorativa</button></center></th>
     <th width="5%"></th>
     <th width="15%"><center><button type="submit" name="4" value="4" class="nome_cat">Cadeira para Sala</button></center></th>
     <th width="5%"></th>
     <th width="15%"><center><button type="submit" name="5" value="5" class="nome_cat">Cadeira de Jantar</button></center></th>
   </tr>

 </table>
</form>
</div>
<nav id="principal_baixo">
  <center><a id="principal" href="#" class="logo">Cardfort</a></center>
</nav>
</div>
  </main>

  <script src="principal_js.js"></script>
   <script src="musica.js"></script>
</body>

</html>