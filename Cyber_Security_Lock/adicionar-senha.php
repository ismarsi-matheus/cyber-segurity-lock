<?php

var_dump($_POST);

$nome_dominio=$_POST["dominio"];
$nome_usuario=$_POST["usuario"];
$senha_dominio=$_POST["senha"];
$nota_usuario=$_POST["nota"];

$dsn = 'mysql:dbname=cyber_segurity_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_senha (dominio,usuario,senha,nota) VALUE (:dominio, :usuario,:senha,:nota)';

$box = $banco->prepare($insert);

$box->execute([
    ':dominio' => $nome_dominio,
    'usuario'=>$nome_usuario,
    ':senha' => $senha_dominio,
    ':nota'=>$nota_usuario
]);
