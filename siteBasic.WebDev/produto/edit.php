<?php 
    include '../config/db.php';
    include '../include/header.php'; 

    if(!isset($_GET['id'])){
        echo 'ID não existe';
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM produto WHERE id='$id'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){
        $nome = $row['nome'];
        $descricao = $row['descricao'];
        $preco = $row['preco'];
        $quantidade = $row['quantidade'];
        $status = $row['status'];
        $codigo = $row['codigo'];
    }
?>

<div class="container mt-4">
    <h2>Editar Produto</h2>
    <form action="save.php?id=<?= $_GET['id'] ?>" method="POST" id="formProduto">
        <div class="mb-2">
            <label>Código:</label>
            <input type="text" name="codigo" value="<?= $codigo ?>" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Nome:</label>
            <input type="text" name="nome"  value="<?= $nome ?>"  class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Descrição:</label>
            <input type="text"  name="descricao" value="<?= $descricao ?>" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Preço:</label>
            <input type="number" step="0.01" name="preco"  value="<?= $preco ?>"  class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Quantidade:</label>
            <input type="number" name="quantidade"  value="<?= $quantidade ?>" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Status:</label>
            <input type="radio" name="status" value="0" <?= $status == 0 ? 'checked' : '' ?>> inativo
            <input type="radio" name="status" value="1" <?= $status == 1 ? 'checked' : '' ?>> Ativo
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
</div>

<script src="https://jsuites.net/v5/jsuites.js"></script>
<script src="../js/script.js"></script>
<?php 
    include '../include/footer.php'; 
?>
