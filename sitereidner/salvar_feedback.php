<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $mensagem = $_POST["mensagem"];

  
    $conexao = mysqli_connect("localhost", "root", "", "comercio_comidas");
    $query = "INSERT INTO feedbacks (nome, mensagem) VALUES ('$nome', '$mensagem')";

    if (mysqli_query($conexao, $query)) {
        $_SESSION["mensagem"] = "Obrigado pelo seu feedback!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["erro"] = "Erro ao salvar o feedback. Por favor, tente novamente.";
        header("Location: feedback.php");
        exit();
    }

    mysqli_close($conexao);
} else {
    $_SESSION["erro"] = "Acesso inválido ao arquivo de salvamento de feedback.";
    header("Location: feedback.php");
    exit();
}
?>
