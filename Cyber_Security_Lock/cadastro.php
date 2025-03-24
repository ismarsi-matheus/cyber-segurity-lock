<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <title>Cadastro</title>
</head>
<body>

        <?php
            $dsn = 'mysql:dbname=cyber_security_lock;host=127.0.0.1';
            $user = 'root';
            $password = '';
            
            $banco = new PDO($dsn, $user, $password);
        ?>


    <section id="secao_container">
        <main class="container">
            <form action="cadastrar-novo.php" method="POST">
                <h1>Cadastro Cyber</h1>

                <input type="hidden" placeholder="id_pessoa" name="id_pessoa">

                <div class="input_box">
                    <input placeholder="Nome" type="text"  name="nome"/>
                    <i class="bi bi-person"></i>
                </div>

                <div class="input_box">
                    <input placeholder="Usuário" type="text"  name="user"/>
                    <i class="bi bi-person"></i>
                </div>


                <div class="input_box">
                    <input type="password" id="senha1" placeholder="Digite sua senha" name="senha">
                    <i class="bi bi-eye-slash" id="toggleSenha1"></i>
                </div>
                
                <div class="input_box">
                    <input type="password" id="senha2" placeholder="Confirme a senha">
                    <i class="bi bi-eye-slash" id="toggleSenha2"></i>
                </div>                

                <div class="input_box">
                    <input type="tel" name="CPF" id="cpf" placeholder="Digite Seu CPF" maxlength="14" required>
                    <i class="bi bi-person-vcard"></i>
                </div>

                <div class="input_box">
                    <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email">
                    <i class="bi bi-envelope"></i>
                </div>

                

                <input type="submit" class="login">
                

                <div class="registro_link">
                    <p>Já tem uma conta? <a href="login.php">Login</a></p>
                </div>
            </form>
        </main>
    </section>

    <script src="assets/js/script.js"></script>
</body>
</html>