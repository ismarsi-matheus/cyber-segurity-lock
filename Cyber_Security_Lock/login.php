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
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <title>Login</title>
</head>

<body>
    <section id="secao_container">
        <main class="container">
            <form action="auxlogin.php" method="POST">
                <h1>Login Cyber</h1>

                <div class="input_box">
                    <input placeholder="Usuário" type="text" name="user" />
                    <i class="bi bi-person"></i>
                </div>

                <div class="input_box">
                    <input type="password" id="senha1" placeholder="Digite sua senha" name="senha">
                    <i class="bi bi-eye-slash" id="toggleSenha1"></i> <!-- ID adicionado aqui -->
                </div>

                <div class="lembrar_senha">
                    <label>
                        <input type="checkbox" name="lembrar_senha" />
                        Lembrar senha
                    </label>
                    <a href="esqueci_senha.php">Esqueci senha</a>
                </div>

                <button type="submit" class="login">Login</button>


                <div class="registro_link">
                    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
            </form>
        </main>
    </section>


    <script src="assets/js/script.js"></script>
</body>

</html>