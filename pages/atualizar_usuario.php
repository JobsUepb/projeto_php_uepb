<?php
require_once '../includes/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssi", $nome, $email, $id);

if ($stmt->execute()) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao atualizar: " . $conexao->error;
}