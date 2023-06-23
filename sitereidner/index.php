<!DOCTYPE html>
<html>
<head>
    <title>Casa Dos Salgados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Casa dos Salgados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
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
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-danger float-left">Sair</a>
    </nav>
    <div class="container mt-4">
        <h1 class="text-center">Bem-vindo à Casa Dos Salgados!</h1>
        <p class="text-center">O melhor site de fornecimento de salgados está aqui, grande variedade de produtos e melhor preço de toda internet.</p>
        <div class="text-center">
            <img src="img/salgado.jpg" alt="Imagem de salgado" style="max-width: 400px;" class="mx-auto d-block">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="footer">
        <p>Email: raphaelsa74@gmail.com</p>
        <p>Número para Contato: (64) 99219-8127</p>
        <p>Todos os direitos reservados S. Alexandre Empreendimento &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>