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
            session_start(); // Inicia a sessão

            // Verifica se o usuário está logado
            if (!isset($_SESSION['id_user'])) {
                header('Location: login.php'); // Redireciona se não estiver logado
                exit();
            }

            $id_user = $_SESSION['id_user']; // Obtém o ID do usuário logado

            // Conexão com o banco de dados
            try {
                $banco = new PDO('mysql:dbname=cyber_security_lock;host=localhost', 'root', '');
                $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Busca todas as senhas do usuário logado
                $query_senha = "
    SELECT dominio, usuario, senha, nota 
    FROM tb_senha
    WHERE id_user = :id_user
";

                $consulta_senha = $banco->prepare($query_senha);
                $consulta_senha->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $consulta_senha->execute();

                // Exibe as senhas associadas ao usuário logado
                while ($row = $consulta_senha->fetch(PDO::FETCH_ASSOC)) {
                    $dominio = htmlspecialchars($row['dominio']);
                    $usuario = htmlspecialchars($row['usuario']);
                    $senha = htmlspecialchars($row['senha']);
                    $nota = htmlspecialchars($row['nota']);

                    // Oculta a senha com asteriscos para mais segurança
                    $senha_oculta = str_repeat('*', strlen($senha));

                    echo <<<HTML
<tr>
    <td>{$dominio}</td>
    <td>{$senha_oculta}</td>
    <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{$dominio}">
            Ver Senha
        </button>
    </td>
</tr>

<!-- Modal para visualizar a senha -->
<div class="modal fade" id="modal{$dominio}" tabindex="-1" aria-labelledby="modalLabel{$dominio}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel{$dominio}">Detalhes da Senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Domínio:</strong> {$dominio}</p>
                <p><strong>Usuário:</strong> {$usuario}</p>
                <p><strong>Senha:</strong> {$senha}</p>
                <p><strong>Nota:</strong> {$nota}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
HTML;
                }
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
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



</body>

</html>