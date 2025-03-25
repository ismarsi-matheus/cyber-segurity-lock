<?php
session_start();

// Conexão com o banco de dados
$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Supondo que você receba o usuário e senha do formulário de login
    $usuario = $_POST['user'];
    $senha = $_POST['senha'];

    $query = "SELECT id FROM tb_user WHERE usuario = :usuario AND senha = :senha";
    $stmt = $banco->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_user'] = $user['id']; // Armazena o ID do usuário na sessão
        header('Location: tela_inicial.php');
        exit();
    } else {
        echo 'Usuário ou senha inválidos';
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>