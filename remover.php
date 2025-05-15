<?php

session_start();

$produtos = $_GET['codigo'];

unset($_SESSION['itens'][$produtos]);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=carrinho.php'>";

?>