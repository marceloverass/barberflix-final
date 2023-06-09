<?php
    include('db/conexao.php');
    session_start();

    if (isset($_SESSION['loginUser']) && isset($_SESSION['senhaUser'])) {
        $loginUser = $_SESSION['loginUser'];
        $senhaUser = $_SESSION['senhaUser'];
        $nomeUser = $_SESSION['nomeUser'];
        $perfil = $_SESSION['perfil'];
        

        $sql = "SELECT * FROM usuarios WHERE loginUser = '{$loginUser}' AND senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
        $linha = mysqli_num_rows($rs);
        
        
        if ($linha == 0) {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        } else {
            $dados = mysqli_fetch_assoc($rs);
            $_SESSION['perfil'] = $dados['perfil'];
            $_SESSION['nomeUser'] = $dados['nomeUser'];
        }
        

    } else {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberflix</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/pattern.css">
    <link rel="stylesheet" href="css/components/header.css">
    <link rel="stylesheet" href="css/components/table.css">
    <link rel="stylesheet" href="css/components/botoes.css">
    <link rel="stylesheet" href="css/components/pagination.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><img class="logo-header" src="img/logo-side-black.png" alt="Logo BarberFlix" width="190px"></div>
                <ul id="navbar-links" class="links">
                        <li><a class="link" href="index.php?menuop=home">Home</a></li>
                        <li><a class="link" href="index.php?menuop=clientes">Clientes</a></li>
                        <li><a class="link" href="index.php?menuop=funcionarios">Funcionários</a></li>
                        <li><a class="link" href="index.php?menuop=servicos">Serviços</a></li>
                        <li><a class="link" href="index.php?menuop=agendamentos">Agendamentos</a></li>
                </ul>
                <a href="logout.php" class="action_btn">Sair</a>
                <div class="toggle_btn">
                    <i class="bi bi-list"></i></div>
                </div>
            </div>
            <div class="modal-content">
                <div class="dropdown_menu">
                            <li><a class="link" href="index.php?menuop=home">Home</a></li>
                            <li><a class="link" href="index.php?menuop=clientes">Clientes</a></li>
                            <li><a class="link" href="index.php?menuop=funcionarios">Funcionários</a></li>
                            <li><a class="link" href="index.php?menuop=servicos">Serviços</a></li>
                            <li><a class="link" href="index.php?menuop=agendamentos">Agendamentos</a></li>
                            <a href="logout.php" class="action_btn">Sair</a>
                </div>
            </div>
    </header>
    <main>
        <div class="container variation1">
        <?php
            $menuop = (isset($_GET['menuop'])) ? $_GET['menuop'] : 'home';
            switch($menuop) {
                case 'home':
                    include('paginas/home/home.php');
                    break;
                case 'clientes':
                    include('paginas/clientes/clientes.php');
                    break;
                case 'cad-cliente':
                    include('paginas/clientes/cad-cliente.php');
                    break;
                case 'inserir-cliente':
                    include('paginas/clientes/inserir-cliente.php');
                    break;
                case 'editar-cliente':
                    include('paginas/clientes/editar-cliente.php');
                    break;
                case 'atualizar-cliente':
                    include('paginas/clientes/atualizar-cliente.php');
                    break;
                case 'excluir-cliente':
                    include('paginas/clientes/excluir-cliente.php');
                    break;
                case 'funcionarios':
                    if ($_SESSION['perfil'] != 'proprietario') {
                        echo "<script>alert('Você não tem permissão para acessar esta página!'); location.href='index.php?menuop=home';</script>";
                    } else {
                        include('paginas/funcionarios/funcionarios.php');
                    }
                    break;
                case 'cad-funcionario':
                    include('paginas/funcionarios/cad-funcionario.php');
                    break;
                case 'inserir-funcionario':
                    include('paginas/funcionarios/inserir-funcionario.php');
                    break;
                case 'editar-funcionario':
                    include('paginas/funcionarios/editar-funcionario.php');
                    break;
                case 'atualizar-funcionario':
                    include('paginas/funcionarios/atualizar-funcionario.php');
                    break;
                case 'excluir-funcionario':
                    include('paginas/funcionarios/excluir-funcionario.php');
                    break;
                case 'servicos':
                    include('paginas/servicos/servicos.php');
                    break;
                case 'cad-servico':
                    include('paginas/servicos/cad-servico.php');
                    break;
                case 'inserir-servico':
                    include('paginas/servicos/inserir-servico.php');
                    break;
                case 'editar-servico':
                    include('paginas/servicos/editar-servico.php');
                    break;
                case 'atualizar-servico':
                    include('paginas/servicos/atualizar-servico.php');
                    break;
                case 'excluir-servico':
                    include('paginas/servicos/excluir-servico.php');
                    break;
                case 'agendamentos':
                    include('paginas/agendamentos/agendamentos.php');
                    break;
                case 'cad-agendamento':
                    include('paginas/agendamentos/cad-agendamento.php');
                    break;
                case 'inserir-agendamento':
                    include('paginas/agendamentos/inserir-agendamento.php');
                    break;
                case 'editar-agendamento':
                    include('paginas/agendamentos/editar-agendamento.php');
                    break;
                case 'atualizar-agendamento':
                    include('paginas/agendamentos/atualizar-agendamento.php');
                    break;
                case 'excluir-agendamento':
                    include('paginas/agendamentos/excluir-agendamento.php');
                    break;
                default:
                    include('paginas/home/home.php');
                    break;
            }
        ?>
    </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
    <script src="./js/btn-toggle.js"></script>
    <script src="./js/link-active.js"></script>

</body>
</html>