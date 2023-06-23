<?php
session_start();


if (isset($_POST["produto_id"])) {
  $produto_id = $_POST["produto_id"];

  
  if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = array(); 
  }

  $_SESSION["carrinho"][$produto_id] = 1; 

 
  header("Location: produtos.php"); 
  exit();
}
?>
