<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
    $cpf = addslashes($_POST['CPF']);
    $usuario = addslashes($_POST['usuario']);
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

    try {
        $banco = new PDO($dsn, $user, $password);

        // Verifica se existe alguém com esse CPF
        $resultado = $banco->query("SELECT id FROM tb_pessoa WHERE cpf = '$cpf'")->fetch();

        if ($resultado) {
            $id_pessoa = $resultado['id'];

            // Verifica se o usuário corresponde ao id da pessoa
            $usuario_encontrado = $banco->query("SELECT * FROM tb_user WHERE usuario = '$usuario' AND id_pessoa = $id_pessoa")->fetch();

            if ($usuario_encontrado) {
                // Atualiza a senha diretamente (sem hash)
                $sucesso = $banco->exec("UPDATE tb_user SET senha = '$nova_senha' WHERE id_pessoa = $id_pessoa AND usuario = '$usuario'");

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
                    alert("Usuário e CPF não correspondem.");
                    window.location.href = "esqueci_senha.php";
                </script>';
            }
        } else {
            echo '<script>
                alert("CPF não encontrado.");
                window.location.href = "esqueci_senha.php";
            </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
            alert("Erro: ' . $e->getMessage() . '");
            window.location.href = "esqueci_senha.php";
        </script>';
    }
}
?>
