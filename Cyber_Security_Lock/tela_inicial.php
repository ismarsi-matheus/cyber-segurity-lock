<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="assets/css/tela_inicial.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<a href="perfil.php"><i class="bi bi-person-square person-icon"></i></a>
<h1>CSL</h1>

<div class="container">
    <!-- Cabeçalho -->
    <section class="header">
        <a href="adicionar_senha.php" class="adicionar_senha"><i class="bi bi-plus-circle"></i></a>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar aqui">
            <i class="bi bi-search"></i>
        </div>
        <div class="menu-container">
            <i class="bi bi-list menu-icon"></i>
            <div class="dropdown-menu" id="dropdownMenu">
                <button class="dropdown-item" id="filterAZ">Filtro A-Z</button>
                <button class="dropdown-item" id="filterDate">Data de Modificação</button>
            </div>
        </div>
    </section>

    <!-- Conteúdo -->
    <section class="content">
        <?php
        try {
            $banco = new PDO('mysql:dbname=cyber_segurity_lock;host=localhost', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $stmt = $banco->query("SELECT dominio, senha FROM tb_senha");

            foreach ($stmt as $row) {
                $dominio = htmlspecialchars($row['dominio']);
                $senha = htmlspecialchars($row['senha']);
                $asteriscos = str_repeat("*", strlen($senha));
                echo "
                <div class='item'>
                    <div class='info'>
                        <span>$dominio</span>
                        <span class='password' data-senha='$senha'>$asteriscos</span>
                        <i class='bi bi-eye-slash toggle-visibility'></i>
                    </div>
                    <a href='formulario_editar.php'><button>Editar</button></a>
                </div>";
            }
        } catch (PDOException $e) {
            echo "<p>Erro: {$e->getMessage()}</p>";
        }
        ?>
    </section>
</div>

<!-- Rodapé -->
<section class="footer">
    <div class="icons">
        <a href="https://accounts.google.com/" target="_blank"><i class="bi bi-envelope"></i></a>
        <i class="bi bi-twitter-x"></i>
        <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
        <i class="bi bi-youtube"></i>
        <i class="bi bi-linkedin"></i>
        <i class="bi bi-whatsapp"></i>
    </div>
    <p>&copy; 2025 - Todos os direitos reservados</p>
    <div class="buttons">
        <a href="suporte.php"><button>Suporte</button></a>
        <a href="sobre_nos.php"><button>Sobre nós</button></a>
    </div>
</section>

<script src="assets/js/mostrar_senhas.js"></script>
<script src="assets/js/mostrar_menu.js"></script>

</body>
</html>
