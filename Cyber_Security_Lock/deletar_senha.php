<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php'); // Redireciona se não estiver logado
    exit();
}

// Verifica se o ID da senha foi enviado
if (!isset($_POST['id'])) {
    header('Location: tela_inicial.php'); // Redireciona se o ID da senha não estiver presente
    exit();
}

$id_user = $_SESSION['id_user']; // Obtém o ID do usuário logado
$id_senha = $_POST['id']; // Obtém o ID da senha a ser excluída

// Conexão com o banco de dados
$banco = new PDO('mysql:dbname=cyber_security_lock;host=localhost', 'root', '');

// Prepara a query de exclusão
$query_excluir = "
    DELETE FROM tb_senha
    WHERE id = $id_senha AND id_user = $id_user
";

// Executa a query
if ($banco->exec($query_excluir)) {
    // Redireciona para a tela inicial com uma mensagem de sucesso
    $_SESSION['mensagem'] = "Senha excluída com sucesso!";
    header('Location: tela_inicial.php');
} else {
    // Redireciona para a tela inicial com uma mensagem de erro
    $_SESSION['mensagem'] = "Erro ao excluir a senha.";
    header('Location: tela_inicial.php');
}
