<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
    $usuario_form = $_POST['user'];
    $usuario_senha = $_POST['senha'];
    $lembrar_senha = isset($_POST['lembrar_senha']) ? true : false;

    $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $script = "SELECT * FROM tb_user WHERE usuario ='{$usuario_form}' AND senha ='{$usuario_senha}'";
    $resultado = $banco->query($script)->fetch();

    if ($resultado) {
        $select_usuario = "SELECT * FROM tb_pessoa WHERE id ={$resultado['id_pessoa']}";
        $dados_usuario = $banco->query($select_usuario)->fetch();

        $_SESSION['id_pessoa'] = $dados_usuario['id'];
        $_SESSION['nome'] = $dados_usuario['nome'];
        $_SESSION['cpf'] = $dados_usuario['cpf'];
        $_SESSION['email'] = $dados_usuario['email'];

        // checbox de lembrar senha 

        if ($lembrar_senha) {
            setcookie('usuario', $usuario_form, time() + (86400 * 30), "/"); // 30 dias
            setcookie('senha', $usuario_senha, time() + (86400 * 30), "/"); // 30 dias
        } else {
            setcookie('usuario', '', time() - 3600, "/");
            setcookie('senha', '', time() - 3600, "/");
        }

        header('Location: tela_inicial.php');
    } else {
        echo '<script>
            alert("Usuário ou Senha não encontrado");
            window.location.replace="login.php";
        </script>';
    }
} else {
    if (isset($_COOKIE['usuario']) && isset($_COOKIE['senha'])) {
        $usuario_form = $_COOKIE['usuario'];
        $usuario_senha = $_COOKIE['senha'];
    }
}
?>