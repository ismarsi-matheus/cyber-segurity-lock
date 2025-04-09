<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = trim($_POST['pergunta']);

    if (!empty($pergunta)) {
        $usuario = $_SESSION['id_user']; // ou outro identificador
        $destino = "matheusismarsi@yahoo.com"; // <-- coloque aqui seu e-mail
        $assunto = "Nova pergunta de suporte";
        $mensagem = "ID do usuário: $usuario\n\nPergunta:\n$pergunta";
        $headers = "From: suporte@seudominio.com"; // pode configurar um domínio seu, ou deixar assim em localhost

        if (mail($destino, $assunto, $mensagem, $headers)) {
            echo "<script>alert('Sua pergunta foi enviada com sucesso!'); window.location.href='tela_inicial.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar a pergunta. Tente novamente.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, escreva uma pergunta.'); history.back();</script>";
    }
}
?>
