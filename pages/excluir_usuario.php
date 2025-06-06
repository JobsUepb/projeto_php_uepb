<?php

session_start();
require_once '../includes/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID inválido.");
}

$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['mensagem'] = "Usuário excluído com sucesso."; 
    header("Location: dashboard.php");
} else {
    echo "Erro ao excluir: " . $conexao->error;
}

?>
