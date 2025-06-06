<?php
require_once __DIR__ . '/../includes/conexao.php'; // ajuste conforme sua estrutura

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se os campos foram enviados
    $nome  = $_POST["nome"] ?? null;
    $email = $_POST["email"] ?? null;
    $senha = $_POST["senha"] ?? null;

    // Verifica se todos os campos foram preenchidos
    if ($nome && $email && $senha) {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara e executa a inserção
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)");
        $stmt->bind_param("sss", $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
            header("Location: login.php"); // redireciona após o cadastro
            exit();
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos!";
    }
} else {
    echo "Requisição inválida.";
}