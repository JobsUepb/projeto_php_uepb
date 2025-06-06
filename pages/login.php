<?php include_once('../includes/header.php'); ?>
<div class="container mt-5">
    <h2>Login</h2>
    <form action="processar_login.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <input type="submit" value="Entrar" class="btn btn-success">
    </form>
</div>
<?php include_once('../includes/footer.php'); ?>


<?php
// Mensagem de erro, se houver (ex: login incorreto)
if (isset($_GET['erro']) && $_GET['erro'] == '1'): ?>
    <div class="container mt-3" style="max-width: 500px;">
        <div class="alert alert-danger text-center">
            Email ou senha inválidos.
        </div>
    </div>
<?php endif; ?>
