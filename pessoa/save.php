<?php
    //print_r($_POST);

    include '../config/db.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_GET['id'] ?? null;
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        // $sql = "INSERT INTO pessoa (nome, email, cpf, cep, endereco, cidade, estado)
        //  VALUES
        //  (?, ?, ?, ?, ?, ?, ?);
        // ";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("sssssss", $nome, $email, $cpf, $cep, $endereco, $cidade, $estado);
        // $stmt->execute();
        // $stmt->close();

         if($id){

            $sql = "UPDATE pessoa SET
             nome='$nome', 
             email='$email', 
             cpf='$cpf', 
             cep='$cep', 
             endereco='$endereco', 
             cidade='$cidade', 
             estado='$estado'
             WHERE id='$id'
            ";

        } else {
            $sql = "INSERT INTO pessoa (nome, email, cpf, cep, endereco, cidade, estado)
            VALUES
            ('$nome', '$email', '$cpf', '$cep', '$endereco', '$cidade', '$estado');
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