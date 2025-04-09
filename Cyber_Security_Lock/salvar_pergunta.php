<?php
session_start();
require_once './classes/Database.php';

if (!isset($_SESSION['id_user'])) {
    echo "Usuário não logado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pergunta = trim($_POST['pergunta']);

    if (!empty($pergunta)) {
        $db = new Database();
        $conn = $db->getConnection();
        $id_user = $_SESSION['id_user'];

        $sql = "INSERT INTO tb_perguntas (id_usuario, pergunta) VALUES ('$id_user', '$pergunta')";
        if ($conn->query($sql) === TRUE) {
            echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Pergunta Enviada</title>
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
                color: #0074E4;
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
                background-color: #0074E4;
                color: white;
                font-weight: bold;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .popup button:hover {
                background-color: #005bb5;
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
            <p>Sua pergunta foi enviada.</p>
            <p>Você será redirecionado em 5 segundos...</p>
            <button onclick="window.location.href=\'suporte.php\'">OK</button>
        </div>

        <script>
            setTimeout(() => {
                window.location.href = "suporte.php";
            }, 5000);
        </script>
    </body>
    </html>';
        } else {
            echo "Erro ao enviar pergunta.";
        }

        $db->closeConnection();
    } else {
        echo "Pergunta vazia.";
    }
}
?>
