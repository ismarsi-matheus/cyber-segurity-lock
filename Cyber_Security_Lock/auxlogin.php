<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {

    $usuario_form = $_POST['user'];
    $usuario_senha = $_POST['senha'];

    $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $script = "SELECT * FROM tb_user WHERE usuario ='{$usuario_form}' AND senha ='{$usuario_senha}'";

    $resultado = $banco->query($script)->fetch();

    if (!empty($resultado) && $resultado != false) {

        $select_usuario = "SELECT *FROM  tb_pessoa WHERE id ={$resultado['id_pessoa']}";
        $dados_usuario = $banco->query($select_usuario)->fetch();

        session_start();

        $_SESSION['id_pessoa']     = $dados_usuario['id'];
        $_SESSION['nome']          = $dados_usuario['nome'];
        $_SESSION['cpf']           = $dados_usuario['cpf'];
        $_SESSION['email']         = $dados_usuario['email'];






        header('location:tela_inicial.php');
    } else {
        echo '<script>
    alert("Usuario ou Senha não encontrado");
    window.location.replace="login.php";
    
    </script>';
    }
};
