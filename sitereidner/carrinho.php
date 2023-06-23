<?php
session_start();

// Conexão com o banco de dados (você precisará adicionar suas próprias informações de conexão)
$conexao = mysqli_connect("localhost", "root", "", "comercio_comidas");

// Verifica se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Verifica se foi realizada a ação de adicionar ao carrinho
if (isset($_GET["acao"]) && $_GET["acao"] === "adicionar" && isset($_GET["produto_id"])) {
    // Obtém o ID do produto a ser adicionado ao carrinho
    $produtoId = $_GET["produto_id"];

    // Verifica se o produto existe no banco de dados
    $query = "SELECT * FROM produtos WHERE id = $produtoId";
    $resultado = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultado) > 0) {
        // O produto existe, adiciona ao carrinho
        $produto = mysqli_fetch_assoc($resultado);

        if (isset($_SESSION["carrinho"])) {
            // Verifica se o produto já está no carrinho
            $produtoJaAdicionado = false;
            foreach ($_SESSION["carrinho"] as $item) {
                if ($item["id"] == $produtoId) {
                    $produtoJaAdicionado = true;
                    break;
                }
            }

            if (!$produtoJaAdicionado) {
                $_SESSION["carrinho"][] = $produto;
            }
        } else {
            $_SESSION["carrinho"][] = $produto;
        }
    }
}

// Verifica se foi realizada a ação de remover do carrinho
if (isset($_POST["removerCarrinho"]) && isset($_POST["produtoId"])) {
    $produtoId = $_POST["produtoId"];

    // Verifica se o carrinho não está vazio
    if (!empty($_SESSION["carrinho"])) {
        // Procura o produto no carrinho
        foreach ($_SESSION["carrinho"] as $indice => $produto) {
            if ($produto["id"] == $produtoId) {
                // Remove o produto do carrinho
                unset($_SESSION["carrinho"][$indice]);
                break;
            }
        }
    }
}

// Verifica se foi realizada a ação de finalizar a compra
if (isset($_POST["finalizarCompra"])) {
    // Verifica se o carrinho não está vazio
    if (!empty($_SESSION["carrinho"])) {
        // Insere as compras no banco de dados
        $usuarioId = 1; // Substitua pelo ID do usuário atualmente logado (apenas para exemplo)
        $dataCompra = date("Y-m-d H:i:s");

        foreach ($_SESSION["carrinho"] as $produto) {
            $produtoId = $produto["id"];
            $nomeProduto = $produto["nome"];
            $preco = $produto["preco"];

            // Insere a compra na tabela "compras"
            $query = "INSERT INTO compras (produto_id, nome, preco)
                      VALUES ($produtoId, '$nomeProduto', $preco)";
            mysqli_query($conexao, $query);
        }

        // Limpa o carrinho após finalizar a compra
        $_SESSION["carrinho"] = array();

        // Redireciona o usuário para uma página de confirmação ou agradecimento
        header("Location: metodo_pagamento.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Casa dos Salgados - Carrinho</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Casa dos Salgados</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Pagina Inicial</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="mt-4">Carrinho de Compras</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION["carrinho"])) {
            foreach ($_SESSION["carrinho"] as $produto) {
                echo "<tr>";
                echo "<td>" . $produto["nome"] . "</td>";
                echo "<td>R$ " . $produto["preco"] . "</td>";
                echo "<td>";
                echo "<form method='post' action='carrinho.php'>";
                echo "<input type='hidden' name='produtoId' value='" . $produto["id"] . "'>";
                echo "<button type='submit' name='removerCarrinho' class='btn btn-danger btn-sm'>Remover</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum produto no carrinho.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <form method="post" action="carrinho.php">
        <a href="produtos.php" class="btn btn-primary">Continuar Comprando</a>
        <button type="submit" name="finalizarCompra" class="btn btn-success">Finalizar Compra</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="footer">
    <p>Todos os direitos reservados S. Alexandre Empreendimento &copy; <?php echo date('Y'); ?></p>
</div>
</body>
</html>
