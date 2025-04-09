<?php
session_start(); // Inicia a sessão

                // Verifica se o usuário está logado
                if (!isset($_SESSION['id_user'])) {
                    header('Location: login.php'); // Redireciona se não estiver logado
                    exit();
                }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/sobre_nos.css">
</head>
<body>
    <div class="menu-icon">
        <i class="bi bi-list"></i>
    </div>
    <div class="container">
        <h1 class="titulo">SOBRE NÓS</h1>
        <div class="info-box">
            <p>
                Somos um grupo da turma TI - 24 do SENAC - Americana - SP, somos formados por Antônio, Matheus L. esse é um projeto de PI feito por nós, a ideia do nosso PI é fazer um site onde temos um banco de dados guardando todas as senhas dos usuários totalmente protegidas com criptografias.
            </p>
            <a href="tela_inicial.php"><button class="botao">Voltar</button></a>
        </div>
    </div>
  
</body>
</html>
