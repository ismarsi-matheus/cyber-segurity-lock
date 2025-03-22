<?php



$nome_dominio=$_POST["dominio"];
$nome_usuario=$_POST["usuario"];
$senha_dominio=$_POST["senha"];
$nota_usuario=$_POST["nota"];

$dsn = 'mysql:dbname=cyber_security_lock;host=localhost';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_senha (dominio,usuario,senha,nota) VALUES (:dominio, :usuario,:senha,:nota)';

$box = $banco->prepare($insert);

$box->execute([
    ':dominio' => $nome_dominio,
    ':usuario'=>$nome_usuario,
    ':senha' => $senha_dominio,
    ':nota'=>$nota_usuario
]);

echo '<script>
        alert("Senha Cadastrada com sucesso!!");
        window.location.replace("tela_inicial.php");
    </script>';