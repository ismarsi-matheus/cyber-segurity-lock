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
            <form method="GET" action="tela_inicial.php" class="search-bar">
                <input type="text" name="pesquisa" placeholder="Pesquisar aqui" value="<?= isset($_GET['pesquisa']) ? htmlspecialchars($_GET['pesquisa']) : '' ?>">
                <button type="submit" style="background: none; border: none;">
                    <i class="bi bi-search"></i>
                </button>
            </form>

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
            <div class="lista-senhas">
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
                
                    // Pega ordenação (A-Z ou por data)
                    $orderBy = 'dominio ASC'; // padrão
                    if (isset($_GET['order'])) {
                        if ($_GET['order'] === 'data') {
                            $orderBy = 'data_modificacao DESC';
                        } elseif ($_GET['order'] === 'az') {
                            $orderBy = 'dominio ASC';
                        }
                    }
                
                    // Pesquisa segura
                    $pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
                
                    if (!empty($pesquisa)) {
                        $query_senha = "
                            SELECT id, dominio, usuario, senha, nota, data_modificacao 
                            FROM tb_senha
                            WHERE id_user = ? AND dominio LIKE ?
                            ORDER BY $orderBy
                        ";
                        $consulta_senha = $banco->prepare($query_senha);
                        $consulta_senha->execute([$id_user, "%$pesquisa%"]);
                    } else {
                        $query_senha = "
                            SELECT id, dominio, usuario, senha, nota, data_modificacao 
                            FROM tb_senha
                            WHERE id_user = ?
                            ORDER BY $orderBy
                        ";
                        $consulta_senha = $banco->prepare($query_senha);
                        $consulta_senha->execute([$id_user]);
                    }
                
                    // Exibição dos resultados (sem alteração aqui)
                    while ($row = $consulta_senha->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id'];
                        $dominio = htmlspecialchars($row['dominio']);
                        $usuario = htmlspecialchars($row['usuario']);
                        $senha = htmlspecialchars($row['senha']);
                        $nota = htmlspecialchars($row['nota']);
                        $senhadobalacubaco = base64_decode($row['senha']);
                        $senha_oculta = str_repeat('*', strlen($senha));

                        echo <<<HTML
                        <div class="senha-card">
                            <div class="senha-info">
                                <p><strong>Domínio:</strong> {$dominio}</p>
                                <p><strong>Usuário:</strong> {$usuario}</p>
                                <p><strong>Senha:</strong> {$senha_oculta}</p>
                            </div>
                            <div class="senha-acoes">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVer{$id}">
                                    Ver Senha
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalEditar{$id}">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir{$id}">
                                    Excluir
                                </button>
                            </div>
                        </div>

                        <!-- Modal para visualizar a senha -->
                        <div class="modal fade" id="modalVer{$id}" tabindex="-1" aria-labelledby="modalLabelVer{$id}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabelVer{$id}">Detalhes da Senha</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Domínio:</strong> {$dominio}</p>
                                        <p><strong>Usuário:</strong> {$usuario}</p>
                                        <p><strong>Senha:</strong>  {$senhadobalacubaco}</p>
                                        <p><strong>Nota:</strong> {$nota}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para editar a senha -->
                        <div class="modal fade" id="modalEditar{$id}" tabindex="-1" aria-labelledby="modalLabelEditar{$id}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabelEditar{$id}">Editar Senha</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="editar_senha.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{$id}">
                                            <div class="mb-3">
                                                <label for="dominio{$id}" class="form-label">Domínio</label>
                                                <input type="text" class="form-control" id="dominio{$id}" name="dominio" value="{$dominio}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="usuario{$id}" class="form-label">Usuário</label>
                                                <input type="text" class="form-control" id="usuario{$id}" name="usuario" value="{$usuario}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="senha{$id}" class="form-label">Senha</label>
                                                <input type="text" class="form-control" id="senha{$id}" name="senha" value="{$senhadobalacubaco}">

                                            </div>
                                            <div class="mb-3">
                                                <label for="nota{$id}" class="form-label">Nota</label>
                                                <textarea class="form-control" id="nota{$id}" name="nota">{$nota}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para excluir a senha -->
                        <div class="modal fade" id="modalExcluir{$id}" tabindex="-1" aria-labelledby="modalLabelExcluir{$id}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabelExcluir{$id}">Excluir Senha</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja excluir a senha para o domínio <strong>{$dominio}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="deletar_senha.php" method="POST">
                                            <input type="hidden" name="id" value="{$id}">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
HTML;
                    }
                } catch (PDOException $e) {
                    echo '<p class="text-danger">Erro: ' . $e->getMessage() . '</p>';
                }
                ?>
            </div>

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

    <script src="assets/js/mostrar_menu.js"></script>   
    
</body>

</html>