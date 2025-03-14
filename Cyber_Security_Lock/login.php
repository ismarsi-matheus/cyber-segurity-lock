<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <title>Login</title>
</head>
<body>
    <section id="secao_container">
        <main class="container">
            <form>
                <h1>Login Cyber</h1>

                <div class="input_box">
                    <input placeholder="Usuário" type="email" />
                    <i class="bi bi-person"></i>
                </div>

                <div class="input_box">
                    <input type="password" id="senha1" placeholder="Digite sua senha">
                    <i class="bi bi-eye-slash" id="toggleSenha1"></i> <!-- ID adicionado aqui -->
                </div>

                <div class="lembrar_senha">
                    <label>
                        <input type="checkbox" />
                        Lembrar senha
                    </label>
                    <a href="#">Esqueci senha</a>
                </div>

                <button type="submit" class="login">Login</button>
                

                <div class="registro_link">
                    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
            </form>
        </main>
    </section>

    
    <script src="assets/js/script.js"></script>
</body>
</html>