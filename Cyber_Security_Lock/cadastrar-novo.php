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

$insert = 'INSERT INTO tb_pessoa (nome,cpf,email) VALUE (:nome, :cpf,:email)';

$box = $banco->prepare($insert);
$box->execute([
    ':nome' => $nomeCadastro,
    ':cpf' => $CPFCadastro,
    ':email' => $emailCadastro
]);

$id_pessoaCadastro = $banco->lastInsertId();
$id_senhaCadastro = $banco->lastInsertId();

$insert = 'INSERT INTO tb_user (usuario, senha, id_pessoa, id_senha) VALUE (:usuario, :senha, :id_pessoa, :id_senha)';

$box = $banco->prepare($insert);

$box->execute([
    ':usuario' => $usuarioCadastro,
    ':senha' => $senhaCadastro,
    ':id_pessoa' => $id_pessoaCadastro,
    ':id_senha' => $id_senhaCadastro
]);

echo '<script>
        alert("Usuario Cadastrado com sucesso!!");
        window.location.replace("login.php");
    </script>';