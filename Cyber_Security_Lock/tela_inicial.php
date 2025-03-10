<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>

    <!-- Estilo CSS -->
    <link rel="stylesheet" href="assets/css/tela_inicial.css">

    <!-- Fonte Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <h1>CSL</h1>
    <div class="container">
        <!-- Cabeçalho -->
        <section class="header">

            <a href="adicionar_senha.php" class="adicionar_senha"><i class="bi bi-plus-circle"></i></a>


            <div class="search-bar">
                <input type="text" placeholder="Pesquisar aqui">
                <i class="bi bi-search"></i>
            </div>

            <i class="bi bi-list menu-icon"></i>
        </section>

        <!-- Seção de Conteúdo -->
        <section class="content">
            <?php
            // Exemplo de senha vinda do banco de dados
            $senha = "MinhaSenha123"; // Simulação do banco de dados
            $asteriscos = str_repeat("*", strlen($senha)); // Gera os asteriscos com o mesmo comprimento da senha
            ?>
            <a href="detalhamento.php"><div class="item">
                <div class="info">
                    <span>Domínio do site</span>
                    <span class="password" data-senha="<?= $senha ?>"><?= $asteriscos ?></span>
                    <i class="bi bi-eye-slash toggle-visibility"></i>
                </div>
                <a href="editar_senha.php"><button>Editar</button></a>
            </div></a>

        </section>


    </div>

    <section class="footer">
        <div class="icons">
            <a href="https://accounts.google.com/" target="_blank"><i class="bi bi-envelope"></i></a>
            <i class="bi bi-twitter-x"></i>
            <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-whatsapp"></i>
        </div>

        <footer>
            <p>&copy; 2025 - Todos os direitos reservados</p>
        </footer>

        <div class="buttons">
            <a href="suporte.php"><button>Suporte</button></a>
            <a href="sobre_nos.php"><button>Sobre nós</button></a>
        </div>
    </section>


    <script src="assets/js/mostrar_senhas.js"></script>
</body>

</html>