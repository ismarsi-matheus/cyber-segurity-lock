<?php

var_dump($_POST);

$nomeCadastro = $_POST['nome'];
$emailCadastro = $_POST['email'];
$CPFCadastro = $_POST['CPF'];
$usuarioCadastro = $_POST['user'];
$senhaCadastro = $_POST['senha'];

$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_user (usuario, senha) VALUE (:usuario, :senha)';

$box = $banco->prepare($insert);

$box->execute([
    ':usuario' => $usuarioCadastro,
    ':senha' => $senhaCadastro
]);


$insert = 'INSERT INTO tb_pessoa (nome,cpf,email) VALUE (:nome, :cpf,:email)';

$box = $banco->prepare($insert);
$box->execute([
    ':nome' => $nomeCadastro,
    ':cpf' => $CPFCadastro,
    ':email' => $emailCadastro
]);
echo '<script>
        alert("Usuario Cadastrado com sucesso!!");
        window.location.replace("login.php");
    </script>';