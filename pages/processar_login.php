<?php
session_start();
include('../includes/conexao.php');
include('../includes/header.php');

// Recebe dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Busca usuário no banco
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

?>

<div class="container mt-5">
    <?php
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verifica senha
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            echo '<div class="alert alert-success">Login realizado com sucesso! Redirecionando...</div>';
            echo '<meta http-equiv="refresh" content="2;url=dashboard.php">';
        } else {
            echo '<div class="alert alert-danger">Senha incorreta.</div>';
            echo '<a href="login.php" class="btn btn-secondary mt-3">Tentar novamente</a>';
        }
    } else {
        echo '<div class="alert alert-warning">Usuário não encontrado.</div>';
        echo '<a href="login.php" class="btn btn-secondary mt-3">Voltar</a>';
    }

    $stmt->close();
    $conexao->close();
    ?>
</div>

<?php include('../includes/footer.php'); ?>