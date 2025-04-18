<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/css/esqueci_senha.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Esqueci Senha</title>
</head>

<body>
    <section id="secao_container">
        <main class="container">
            <form action="alterar-senha.php" method="POST">
                <h1>Esqueci Senha</h1>

                <div class="input_box">
                    <input type="tel" name="CPF" id="cpf" placeholder="Digite Seu CPF" maxlength="14" required>
                    <i class="bi bi-person-vcard"></i>
                </div>

                <div class="input_box">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuário" required>
                    <i class="bi bi-person"></i>
                </div>


                <div class="input_box">
                    <input type="password" id="senha1" placeholder="Digite sua nova senha" name="nova_senha" required>
                    <i class="bi bi-eye-slash" id="toggleSenha1"></i>
                </div>

                <div class="input_box">
                    <input type="password" id="senha2" placeholder="Confirme a nova senha" name="confirmar_senha" required>
                    <i class="bi bi-eye-slash" id="toggleSenha2"></i>
                </div>


                <div class="validador-senha" id="validador">
                    <i class="bi bi-shield-lock" style="font-size: 24px; color: #0074e4; margin-bottom: 10px;"></i>
                    <p id="comprimento">✘ Mínimo 8 caracteres</p>
                    <p id="maiuscula">✘ Precisa de letra maiúscula</p>
                    <p id="numero">✘ Precisa de número</p>
                    <p id="especial">✘ Precisa de caractere especial</p>
                    <p id="igual">✘ Senhas não coincidem</p>
                </div>

                <input type="submit" class="login btn btn-primary" value="Alterar Senha">
            </form>

            <div class="text-center mt-3">
                <a href="login.php" class="btn btn-secondary">Voltar para Login</a>
            </div>
        </main>
    </section>

    <script src="assets/js/esqueci_senha.js"></script>
</body>

</html>