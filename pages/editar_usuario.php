<?php
require_once '../includes/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="atualizar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>
        <button type="submit">Salvar Alterações</button>
    </form>
    <br>
    <a href="dashboard.php">Voltar</a>
</body>
</html>