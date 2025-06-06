<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto_php_uepb";

// Conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificação
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>