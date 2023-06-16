<?php
    include "./db/conexao.php";

    $msg_error = "";

    if( isset($_POST["loginUser"]) && isset($_POST["senhaUser"])) {
        $loginUser = mysqli_real_escape_string($conexao, $_POST["loginUser"]);
        $senhaUser = mysqli_real_escape_string($conexao, $_POST["senhaUser"]);
        $perfil = mysqli_real_escape_string($conexao, $_POST["perfil"]);
        
        $sql = "SELECT * FROM usuarios WHERE loginUser = '{$loginUser}' AND senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
        $linha = mysqli_num_rows($rs);
        
        
        if ($linha != 0) {
            session_start();
            $_SESSION['loginUser'] = $loginUser;
            $_SESSION['senhaUser'] = $senhaUser;
            $_SESSION['nomeUser'] = $dados['nomeUser'];
            $_SESSION['perfil'] = $perfil;
            header("Location: index.php");
        } else {
            $msg_error = "<div class='alert alert-danger' role='alert'>
                                <p>Usuário ou senha inválidos!</p>
                          </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/components/botoes.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body class="bg-secondary">
    
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center mb-4">
                    <img src="./img/logo-side-black.png" alt="Barberflix Logo">
                </div>
                <form class="needs-validation" action="login.php" method="POST" novalidate>
                    <div class="form-group mb-4">
                        <label class="form-label" for="loginUser">Login</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                            <div class="invalid-feedback">
                                Informe o username.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="senhaUser">Senha</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="senhaUser" id="senhaUser" required>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                        <?php 
                                echo $msg_error; 
                        ?>
                    <button class="btn btn-outline-secondary botoes w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>
</html>