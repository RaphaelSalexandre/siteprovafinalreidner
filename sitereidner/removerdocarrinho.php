<?php
session_start();
function removerdocarrinho() {
if (isset($_GET['id'])) {
    $produtoId = $_GET['id'];

 
    if (isset($_SESSION['carrinho'])) {
  
        if (isset($_SESSION['carrinho'][$produtoId])) {
         
            unset($_SESSION['carrinho'][$produtoId]);
            $_SESSION['mensagem'] = 'Produto removido do carrinho.';
        } else {
            $_SESSION['erro'] = 'Produto não encontrado no carrinho.';
        }
    } else {
        $_SESSION['erro'] = 'Carrinho de compras não encontrado.';
    }
} else {
    $_SESSION['erro'] = 'ID do produto não fornecido.';
}


header('Location: carrinho.php');
exit();
}
?>
