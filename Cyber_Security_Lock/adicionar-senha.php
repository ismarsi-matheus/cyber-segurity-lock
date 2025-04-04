<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$nome_dominio = $_POST["dominio"];
$nome_usuario = $_POST["usuario"];
$senha_dominio = base64_encode($_POST["senha"]); // Codificando com Base64
$nota_usuario = $_POST["nota"];

$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

try {   
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insert = 'INSERT INTO tb_senha (dominio, usuario, senha, nota, id_user) 
               VALUES (:dominio, :usuario, :senha, :nota, :id_user)';

    $box = $banco->prepare($insert);

    $box->execute([
        ':dominio' => $nome_dominio,
        ':usuario' => $nome_usuario,
        ':senha' => $senha_dominio,
        ':nota' => $nota_usuario,
        ':id_user' => $id_user
    ]);

    echo '<script>
            alert("Senha Cadastrada com sucesso!!");
            window.location.replace("tela_inicial.php");
        </script>';
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

?>