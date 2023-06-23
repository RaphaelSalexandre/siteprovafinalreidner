<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include 'finalizarcompra.php'; 
    $metodoPagamento = $_POST["metodoPagamento"];

    
    finalizarCompra($metodoPagamento);

    header("Location: checkout.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Comércio de Comidas - Método de Pagamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Método de Pagamento</h1>

        <form method="post" action="metodo_pagamento.php">
            <div class="form-group">
                <label for="metodoPagamento">Selecione o Método de Pagamento:</label>
                <select class="form-control" name="metodoPagamento" id="metodoPagamento" required>
                    <option value="cartao">Cartão de Crédito</option>
                    <option value="boleto">Boleto Bancário</option>
                    <option value="boleto">PIX</option>
                    <option value="boleto">Debito</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
