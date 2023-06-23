<?php
session_start();


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: carrinho.php"); 
    exit();
}


if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casa dos Salgados - Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Checkout</h1>
        <div class="alert alert-success" role="alert">
            Obrigado por comprar conosco! Sua compra foi concluída com sucesso.
        </div>
        <p>Agradecemos por escolher nossos produtos. Esperamos vê-lo novamente em breve!</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
