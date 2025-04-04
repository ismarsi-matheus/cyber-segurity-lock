<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$id = $_POST["id"];
$dominio = $_POST["dominio"];
$usuario = $_POST["usuario"];
$senha = base64_encode($_POST["senha"]); // Codificando com Base64
$nota = $_POST["nota"];

$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$update = 'UPDATE tb_senha 
           SET dominio = :dominio, usuario = :usuario, senha = :senha, nota = :nota 
           WHERE id = :id AND id_user = :id_user';

$box = $banco->prepare($update);

$box->execute([
    ':dominio' => $dominio,
    ':usuario' => $usuario,
    ':senha' => $senha,
    ':nota' => $nota,
    ':id' => $id,
    ':id_user' => $id_user
]);

echo '<script>
        alert("Informações atualizadas com sucesso!!");
        window.location.replace("tela_inicial.php");
    </script>';
