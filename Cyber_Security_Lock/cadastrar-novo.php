<?php

$nomeCadastro = $_POST['nome'];
$emailCadastro = $_POST['email'];
$CPFCadastro = $_POST['CPF'];
$usuarioCadastro = $_POST['user'];
$senhaCadastro = $_POST['senha'];

$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inserir na tabela tb_pessoa
    $insert = 'INSERT INTO tb_pessoa (nome, cpf, email) VALUES (:nome, :cpf, :email)';
    $box = $banco->prepare($insert);
    $box->execute([
        ':nome' => $nomeCadastro,
        ':cpf' => $CPFCadastro,
        ':email' => $emailCadastro
    ]);

    $id_pessoaCadastro = $banco->lastInsertId();

    // Inserir na tabela tb_user
    $insert = 'INSERT INTO tb_user (usuario, senha, id_pessoa) VALUES (:usuario, :senha, :id_pessoa)';
    $box = $banco->prepare($insert);
    $box->execute([
        ':usuario' => $usuarioCadastro,
        ':senha' => $senhaCadastro,
        ':id_pessoa' => $id_pessoaCadastro
    ]);

    // Exibir popup estilizado com redirecionamento
    echo '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Concluído</title>
        <style>
            body {
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: "Poppins", sans-serif;
            }

            .popup {
                background: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0,0,0,0.3);
                text-align: center;
                animation: fadeIn 0.4s ease-in-out;
            }

            .popup h2 {
                color: #28a745;
                margin-bottom: 10px;
            }

            .popup p {
                margin-bottom: 20px;
                color: #333;
            }

            .popup button {
                padding: 10px 25px;
                border: none;
                border-radius: 5px;
                background-color: #28a745;
                color: white;
                font-weight: bold;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .popup button:hover {
                background-color: #218838;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: scale(0.9); }
                to { opacity: 1; transform: scale(1); }
            }
        </style>
    </head>
    <body>
        <div class="popup">
            <h2>✔ Sucesso!</h2>
            <p>Usuário cadastrado com sucesso.</p>
            <p>Você será redirecionado para o login em 5 segundos...</p>
            <button onclick="window.location.href=\'login.php\'">OK</button>
        </div>

        <script>
            setTimeout(() => {
                window.location.href = "login.php";
            }, 5000);
        </script>
    </body>
    </html>';

} catch (PDOException $e) {
    echo 'Erro ao cadastrar: ' . $e->getMessage();
}
?>
