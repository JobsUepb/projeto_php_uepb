<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include('../includes/conexao.php');
include('../includes/header.php');

// Buscar todos os usuários
$sql = "SELECT nome, email FROM usuarios ORDER BY data_cadastro DESC";
$resultado = $conexao->query($sql);
?>

<div class="container mt-5">

     <?php
    if (isset($_SESSION['mensagem'])) {
        echo '<div class="alert alert-success text-center">' . $_SESSION['mensagem'] . '</div>';
        unset($_SESSION['mensagem']);
    }
    ?>
    
    <h2 class="mb-4">Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
    <p class="lead">Você está logado.</p>

    <hr>

    <h4>Usuários Cadastrados</h4>

    <?php if ($resultado->num_rows > 0): ?>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhum usuário cadastrado ainda.</div>
    <?php endif; ?>

    <a href="logout.php" class="btn btn-danger mt-4">Sair</a>
</div>

<?php
include('../includes/footer.php');
$conexao->close();
?>