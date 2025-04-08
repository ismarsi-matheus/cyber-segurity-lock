<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
    $cpf = $_POST['CPF'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        echo '<script>
            alert("As senhas não coincidem.");
            window.location.href = "esqueci_senha.php";
        </script>';
        exit();
    }

    $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $resultado = $banco->query("SELECT id FROM tb_pessoa WHERE cpf = '{$cpf}'")->fetch();

    if ($resultado) {
        $id_pessoa = $resultado['id'];

        $sucesso = $banco->exec("UPDATE tb_user SET senha = '{$nova_senha}' WHERE id_pessoa = {$id_pessoa}");

        if ($sucesso) {
            echo '<script>
                alert("Senha alterada com sucesso.");
                window.location.href = "login.php";
            </script>';
        } else {
            echo '<script>
                alert("Erro ao alterar a senha.");
                window.location.href = "esqueci_senha.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("CPF não encontrado.");
            window.location.href = "esqueci_senha.php";
        </script>';
    }
}
?>
