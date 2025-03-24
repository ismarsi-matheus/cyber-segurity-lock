<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
    $cpf = $_POST['CPF'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        echo '<script>
            alert("As senhas não coincidem.");
            window.location.replace="esqueci-senha.php";
        </script>';
        exit();
    }

    $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $script = "SELECT id FROM tb_pessoa WHERE cpf = '{$cpf}'";
    $resultado = $banco->query($script)->fetch();

    if ($resultado) {
        $id_pessoa = $resultado['id'];
        $update_script = "UPDATE tb_user SET senha = '{$nova_senha}' WHERE id_pessoa = {$id_pessoa}";

        if ($banco->exec($update_script)) {
            echo '<script>
                alert("Senha alterada com sucesso.");
                window.location.replace="login.php";
            </script>';
        } else {
            echo '<script>
                alert("Erro ao alterar a senha.");
                window.location.replace="esqueci-senha.html";
            </script>';
        }
    } else {
        echo '<script>
            alert("CPF não encontrado.");
            window.location.replace="esqueci-senha.html";
        </script>';
    }
}
?>