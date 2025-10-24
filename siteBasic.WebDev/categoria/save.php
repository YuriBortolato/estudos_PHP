<?php
    include '../config/db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_GET['id'] ?? null;
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'] ?? null;
        $status = $_POST['status'] ?? 1;

        if($id){

            $sql = "UPDATE categoria SET
                nome='$nome',
                descricao='$descricao',
                status='$status'
                WHERE id='$id'
            ";

        } else {
            $sql = "INSERT INTO categoria (nome, descricao, status)
                VALUES
                ('$nome', '$descricao', '$status');
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
