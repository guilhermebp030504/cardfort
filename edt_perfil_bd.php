<?php

      include("mysql.php");
 
      mysqli_set_charset($conexao, "utf8");

      $codigo = $_POST['codigo'];
      $nome = $_POST['nome'];
      $sobrenome = $_POST['sobrenome'];
      $email = $_POST['email'];
      $usuario = $_POST['usuario'];

      if (empty($_FILES['imagem']['size']) != false) {
       
        $sql = "update cadastro 
              set nome = '$nome',
              sobrenome = '$sobrenome', 
              email = '$email',
              usuario = '$usuario'
              where codigo = $codigo";
  

  $r = mysqli_query($conexao, $sql);
      }

      else{
  $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
  $arquivo = time().$extensao;
  $diretorio = "img_bd/";

  move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$arquivo);

      $sql = "update cadastro 
              set nome = '$nome',
              sobrenome = '$sobrenome', 
              email = '$email',
              usuario = '$usuario',
              foto = '$arquivo'
              where codigo = $codigo";
  

  $r = mysqli_query($conexao, $sql);

  if ($r == false) {
    echo "Erro ao salvar.";
    exit;
  }
}

  header("location: principal.php");
  
  ?>