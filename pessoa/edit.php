<?php 
    include '../config/db.php';
    include '../include/header.php'; 

    if(!isset($_GET['id'])){
        echo 'ID não exite';
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM pessoa WHERE id='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        $nome = $row['nome'];
        $email = $row['email'];
        $cpf = $row['cpf'];
        $cep = $row['cep'];
    }
?>

<div class="container mt-4">
    <h2>Cadastrar Pessoa</h2>
    <form action="save.php?id=<?= $_GET['id'] ?>" method="POST" id="formPessoa">
        <div class="mb-2">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $nome ?>" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?= $cpf ?>" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Email:</label>
            <input type="email" name="email" value="<?= $email ?>" class="form-control" required>
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