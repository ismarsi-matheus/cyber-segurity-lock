<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Senha</title>
    <link rel="stylesheet" href="assets/css/adicionar_senha.css">
</head>

<body>
    <?php
    $dsn = 'mysql:dbname=cyber_segurity_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);
    ?>

    <div class="container">
        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>

        <div class="form-container">
            <h1>Adicionar Senha</h1>
            <form action="adicionar-senha.php" method="POST">
                <div class="input-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" placeholder="Digite aqui" name="dominio">
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" placeholder="Digite aqui" name="senha">
                </div>
                <button type="submit" class="btn btn-primary">SALVAR</button>
                <a href="tela_inicial.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
            </form>
        </div>

</body>

</html>