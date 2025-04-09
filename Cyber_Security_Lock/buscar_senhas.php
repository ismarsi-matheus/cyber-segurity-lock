<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    exit();
}

$id_user = $_SESSION['id_user'];

$banco = new PDO("mysql:dbname=cyber_security_lock;host=localhost", "root", "");

$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'az';

$orderBy = ($order === 'data') ? 'data_modificacao DESC' : 'dominio ASC';

if (!empty($pesquisa)) {
    $query = "SELECT * FROM tb_senha WHERE id_user = $id_user AND dominio LIKE '%$pesquisa%' ORDER BY $orderBy";
} else {
    $query = "SELECT * FROM tb_senha WHERE id_user = $id_user ORDER BY $orderBy";
}

$resultado = $banco->query($query);

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $dominio = htmlspecialchars($row['dominio']);
    $usuario = htmlspecialchars($row['usuario']);
    $senha = htmlspecialchars($row['senha']);
    $nota = htmlspecialchars($row['nota']);
    $senhadobalacubaco = base64_decode($row['senha']);
    $senha_oculta = str_repeat('*', strlen($senha));

    echo <<<HTML
    <div class="senha-card">
        <div class="senha-info">
            <p><strong>Domínio:</strong> {$dominio}</p>
            <p><strong>Usuário:</strong> {$usuario}</p>
            <p><strong>Senha:</strong> {$senha_oculta}</p>
        </div>
        <div class="senha-acoes">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVer{$id}">Ver Senha</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalEditar{$id}">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir{$id}">Excluir</button>
        </div>
    </div>
HTML;
}
?>
