<?php

var_dump($_POST);

$nomeCadastro = $_POST['nome'];
$emailCadastro = $_POST['email'];
$CPFCadastro = $_POST['CPF'];
$usuarioCadastro = $_POST['user'];
$senhaCadastro = $_POST['senha'];

$dsn = 'mysql:dbname=db_cyber_segurity_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert='INSERT INTO tb_user (nome, email, CPF, usuario, senha) VALUE (:nome, :email, :CPF, :usuario, :senha)';

$box = $banco->prepare($insert);

$box->execute([
    ':nome' => $nomeCadastro,
    ':email' => $emailCadastro,
    ':CPF' => $CPFCadastro,
    ':usuario' => $usuarioCadastro,
    ':senha' => $senhaCadastro,
]);








