<?php session_start(); 

?>
<!DOCTYPE html>
<html>

<head>
    <title>Comércio de Comidas - Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .footer {
            background-color: green;
            border-top: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            color: white;
        }
    </style>
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
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Pagina Inicial</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Produtos Disponíveis</h1>
        <div class="row">
            <?php
           
            $conexao = mysqli_connect("localhost", "root", "", "comercio_comidas");

      
            if (!$conexao) {
                die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
            }

          
            $query = "SELECT * FROM produtos";
            $resultado = mysqli_query($conexao, $query);

            
            if (mysqli_num_rows($resultado) > 0) {
             
                while ($produto = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='col-3'>";
                    echo "<h3>" . $produto["nome"] . "</h3>";
                    if (isset($produto["descricao"])) 
                    echo "<p>" . $produto["descricao"] . "</p>";
                    echo "<p>Preço: R$ " . $produto["preco"] . "</p>";
                    echo "<a href='carrinho.php?acao=adicionar&produto_id=" . $produto["id"] . "' class='btn btn-primary'>Adicionar ao Carrinho</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto cadastrado.</p>";
            }
            mysqli_close($conexao);              
            ?>
        </div>
        <?php
        if($_SESSION['nivel_acesso'] == 1): ?>
            <a href="cadastro_produto.php" class="btn btn-primary mt-3">Cadastrar Novo Produto</a>
        
        <?php    endif;
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="footer">
        <p>Todos os direitos reservados S. Alexandre Emprendimento &copy; <?php echo date('Y'); ?></p>
    </div>
</body>

</html>
