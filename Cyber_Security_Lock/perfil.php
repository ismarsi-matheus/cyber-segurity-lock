<?php
session_start();
require './classes/Database.php'; // Importa a classe de conexão

// Criar instância do banco de dados e obter a conexão
$db = new Database();
$conn = $db->getConnection();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_user'];

// Consulta SQL para buscar os dados do usuário logado
$sql = "SELECT p.nome, u.usuario, p.cpf, p.email 
        FROM tb_user u
        INNER JOIN tb_pessoa p ON u.id_pessoa = p.id
        WHERE u.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou o usuário
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado!";
    exit();
}

// Fecha a conexão após a execução
$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4 text-center">
            <h1 class="mb-3">Perfil</h1>
            <div class="profile-info">
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
                <p><strong>Nome de usuário:</strong> <?php echo htmlspecialchars($usuario['usuario']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                <p><strong>CPF:</strong> <?php echo substr($usuario['cpf'], 0, 3) . ".***.***-" . substr($usuario['cpf'], -2); ?></p>
            </div>
            <div class="mt-4">
                <a href="tela_inicial.php" class="btn btn-primary">Voltar</a>
                <a href="./classes/Logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>