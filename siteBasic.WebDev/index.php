<?php
    $msg_class = 'alert-dark';
    $msg = 'Bem vindo ao Guarana.';  
    if(isset($_POST['email']) || isset($_POST['senha']) ){
        if($_POST['email'] == '' || $_POST['senha'] == ''){
            $msg_class = 'alert-danger';
            $msg = 'E-mail ou senha inválida';
        } else {
            include './config/db.php';

            $email = $_POST['email'];
            $senha = md5($_POST['senha']);

            $sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
            $result = $conn->query($sql);

            if($result->num_rows == 0){
                $msg_class = 'alert-danger';
                $msg = 'Email ou Senha Invalida.';
            } else {
                while($row = $result->fetch_assoc()){
                    if($row['ativo'] == 0){
                        $msg_class = 'alert-warning';
                        $msg = 'Usuária bloqueado entre em contato com adm.';
                    } else {

                        $msg_class = 'alert-success';
                        $msg = 'Login efeuado com sucesso.';
             
                        session_start();
                        $_SESSION['LOGADO'] = TRUE;
                        sleep(2);
                        header('location: ./dahsboard');

                    }
                }
            }
        }
        
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
</head>
<body>
    <form action="" method="post">
        <img class="logo" src="./assets/GuaranaLogo.png" alt="logo">
        <div class="alert <?= $msg_class ?>"><?= $msg ?></div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>
        <input type="submit" value="Entrar" class="btn btn-lg btn-dark"/>
    </form>

    <style>
        body{
            background: #f8f9fa;
        }
        form{
            width: 350px;
            margin:auto;
            margin-top: 10%;
            border: 1px #CCC solid;
            border-radius: 10px;
            background: #FFF;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
            padding: 15px;
        }
        .btn-dark{
            width: 100%;
            margin: 15px 0 0;
        }
        .logo{
            width: 150px;
            display: block;
            margin: auto;
            margin-bottom: 20px;
        }
    </style>
</body>
</html>