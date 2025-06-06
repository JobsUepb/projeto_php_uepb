<?php include_once('../includes/header.php'); ?>
<div class="container mt-5">
    <h2>Cadastro de Usuário</h2>
    <form action="processar_cadastro.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</div>
<?php include_once('../includes/footer.php'); ?>