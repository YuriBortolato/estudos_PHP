<?php 
    include '../config/db.php';
    include '../include/header.php'; 
?>

<div class="container mt-4">
    <h2>Cadastrar Categoria </h2>
    <form action="save.php" method="POST" id="formCatalogo">
        <div class="mb-2">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Descrição:</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
</div>

<script src="https://jsuites.net/v5/jsuites.js"></script>
<script src="../js/script.js"></script>

<?php 
    include '../include/footer.php'; 
?>
