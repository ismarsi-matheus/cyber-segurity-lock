<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php'); // Redireciona se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="assets/css/suporte.css">
</head>

<body>
    <div class="content">


        <div class="info-box">
            <p>
                Tente entrar em contato conosco através do e-mail ou assistentes virtuais, você primeiro falara com um assistente virtual no whatsapp, se caso não conseguir resolver seu problema nos mande um e-mail.
            </p>

            <h2>Perguntas Frequentes</h2>
            <ul>
                <li><strong>Por que devo confiar no site?</strong> R: Tentamos ajudar da melhor maneira possível e de maneira simples e fácil de ser entendida.</li>
                <li><strong>Pago para utilizar?</strong> R: Não, totalmente de graça para o seu uso.</li>
                <li><strong>Tem mais alguma forma de proteger meus dados ainda mais?</strong> R: Sim, você não passar os seus dados para ninguém principalmente porque nunca vamos pedir seus dados de acesso </li>
            </ul>

            <form action="enviar_pergunta.php" method="POST">
                <label for="question">Faça sua pergunta:</label>
                <textarea id="question" name="pergunta" placeholder="Digite aqui sua dúvida..." rows="5" required></textarea>

                <div class="btn-container">
                    <button type="submit" class="btn">Enviar</button>
                    <a href="tela_inicial.php"><button type="button" class="btn">Voltar</button></a>
                </div>
            </form>


        </div>
    </div>

</body>

</html>