<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Senha</title>
    <link rel="stylesheet" href="assets/css/adicionar_senha.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head> 

<body>
    <?php
    $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
    $user = 'root';
    $password = '';
    
    $banco = new PDO($dsn, $user, $password);
    
    ?>
    <div class="container">
        <h1><i class="fas fa-lock"></i> Adicionar Senha</h1>
        <form action="adicionar-senha.php" method="POST">
            <div class="input-group">
                <label for="dominio">Domínio</label>
                <input type="text" id="dominio" placeholder="Ex: www.exemplo.com" name="dominio">
            </div>
            <div class="input-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" placeholder="Digite seu usuário" name="usuario">
            </div>
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="text" id="senha" placeholder="Digite sua senha" name="senha">
            </div>
            <div class="input-group">
                <label for="nota">Nota</label>
                <textarea id="nota" placeholder="Adicione uma observação" name="nota"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        <a href="tela_inicial.php" class="btn btn-primary btn_voltar">Voltar</a>
    </div>
</body>

</html>