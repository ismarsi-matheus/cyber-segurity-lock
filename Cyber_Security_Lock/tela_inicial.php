<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="assets/css/tela_inicial.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            // Conexão com o banco de dados usando PDO
            $banco = new PDO('mysql:dbname=cyber_segurity_lock;host=localhost', 'root', '');

            // Executa uma consulta para obter o domínio e a senha armazenados na tabela tb_senha
            $resultado = $banco->query("SELECT dominio, senha FROM tb_senha");

            // Percorre cada linha do resultado da consulta usando um loop while
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                // Protege os dados contra possíveis ataques XSS usando htmlspecialchars()
                $dominio = htmlspecialchars($row['dominio']);
                $senha = htmlspecialchars($row['senha']);

                // Converte a senha para asteriscos, mantendo o mesmo número de caracteres
                $asteriscos = str_repeat("*", strlen($senha));

                // Exibe as informações na página com HTML dinâmico
                echo <<<HTML
        <div class='item'>
            <div class='info'>
                <!-- Mostra o domínio -->
                <span>{$dominio}</span>
                <!-- Ícone de olho para mostrar/ocultar a senha -->
                
            </div>

            <!-- Botão para editar a senha -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{$dominio}">
                Editar
            </button>

        </div>
        HTML;
            }
            ?>
            
    </div>
    </section>
    <div class="modal fade" id="modal{$dominio}" tabindex="-1" aria-labelledby="modalLabel{$dominio}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel{$dominio}">Detalhes da Senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Domínio:</strong> {$dominio}</p>
                    <p><strong>Senha:</strong> {$senha}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
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