<?php 
include '../config/db.php';
include '../include/header.php';
?>

<div class="container mt-4">
    <h2> Cadastrar pessoas  </h2>
    <form action="save.php" id="fromPessoa">
        <div class="mb-2">
            <label>Nome: </label>
            <input type="text" name="form-control" required>
        </div>
        <button class="btn btn-sucess" type="submit">Salvar</button>
    </form>
</div>

<?php include '../include/footer.php';  ?>