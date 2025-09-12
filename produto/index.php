<?php 
    include '../config/db.php';
    include '../include/header.php'; 
?>

<div class="container mt-4">
    <h2>Produtos cadastrados</h2>
    <a href="./create.php" class="btn btn-primary mb-3">Novo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>codigo</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM produto";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()){
                    $sts = ($row['status']) ? 'ativo' : 'inativo';   
                    echo "
                        <tr>
                            <td><span class='sts {$sts}'></span></td>
                            <td>{$row['codigo']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['descricao']}</td>
                            <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                            <td>{$row['quantidade']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-info'>Editar</a>
                                <a href='delete.php?id={$row['id']}' 
                                onclick='return confirm(\"Deseja excluir?\")'
                                class='btn btn-danger'>Excluir</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</div>

<style>
    .sts {
        width: 20px;
        height: 20px;
        border: 1px #CCC solid;
        display: block;
    }
    .inativo {
        background: red;
    }
    .ativo {
        background: green; 
    }
</style>

<?php include '../include/footer.php'; ?>
