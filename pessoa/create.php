<?php 
    include '../config/db.php';
    include '../include/header.php'; 
?>

<div class="container mt-4">
    <h2>Atualizar Pessoa</h2>
    <form action="save.php" method="POST" id="formPessoa">
        <div class="mb-2">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>CPF:</label>
            <input type="text" name="cpf" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>CEP:</label>
            <input type="text" name="cep" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Endereço:</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Cidade:</label>
            <input type="text" name="cidade" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Estado:</label>
            <input type="text" name="estado" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
</div>

<?php 
    include '../include/footer.php'; 
?>