<?php
require_once '../includes/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao excluir: " . $conexao->error;
}