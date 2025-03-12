<?php

var_dump($_POST);

$nome_dominio=$_POST["dominio"];
$senha_dominio=$_POST["senha"];

$dsn = 'mysql:dbname=cyber_segurity_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_senha (dominio,senha) VALUE (:dominio, :senha)';

$box = $banco->prepare($insert);

$box->execute([
    ':dominio' => $nome_dominio,
    ':senha' => $senha_dominio
]);
