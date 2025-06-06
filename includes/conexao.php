<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto_php_uepb";

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    // Em produção, evite mostrar detalhes técnicos
    die("Falha na conexão com o banco de dados.");
}

// Opcional: definir charset para evitar problemas de codificação
$conexao->set_charset("utf8mb4");
?>