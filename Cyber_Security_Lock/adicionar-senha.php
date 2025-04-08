<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$nome_dominio = $_POST["dominio"];
$nome_usuario = $_POST["usuario"];
$senha_dominio = base64_encode($_POST["senha"]);
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

    echo '    <!DOCTYPE html>
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
            <p>Senha cadastrada com sucesso.</p>
            <p>Você será redirecionado em 5 segundos...</p>
            <button onclick="window.location.href=\'tela_inicial.php\'">OK</button>
        </div>

        <script>
            setTimeout(() => {
                window.location.href = "tela_inicial.php";
            }, 5000);
        </script>
    </body>
    </html>';
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
