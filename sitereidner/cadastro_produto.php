<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title> Casa dos Salgados - Cadastro de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Cadastro de Produto</h1>
        <form method="post" action="cadastrarProduto.php">
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="nome">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
