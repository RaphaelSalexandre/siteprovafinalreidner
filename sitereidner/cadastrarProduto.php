<?php
session_start();

include 'conexao.php';
    $nome = $_POST['nome'];
    $nome = $_POST['descricao'];
    $preco = $_POST['preco'];
   

        $query = "INSERT INTO produtos (nome, preco) VALUES ('$nome',  '$preco')";

        if (mysqli_query($conn, $query)) {
            $_SESSION["mensagem"] = "Produto cadastrado com sucesso.";
            header("Location: produtos.php");
            exit();
        } else {
            $erro = "Erro ao cadastrar o produto. Tente novamente.";
            echo $erro;
        }

      
        mysqli_close($conn);
    
