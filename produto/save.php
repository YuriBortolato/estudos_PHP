<?php

include '../config/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_GET['id'] ?? null;
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $status = $_POST['status'] ?? 1;

    if($id){

        $sql = "UPDATE produto SET
         nome='$nome', 
         descricao='$descricao', 
         preco='$preco',
         quantidade='$quantidade',
         status='$status',
         codigo='$codigo'
         WHERE id='$id'
        ";

    } else {
        $sql = "INSERT INTO produto (codigo, nome, descricao, preco, quantidade, status)
        VALUES
        ('$codigo', '$nome', '$descricao', '$preco', '$quantidade', '$status');
        ";
    }

    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit;
    } else {
        echo 'Error: ' . $conn->error;
    }

    $conn->close();

}

?>
