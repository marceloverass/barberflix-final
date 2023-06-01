<?php
    $idFuncionario = $_POST['idFuncionario'];
    $nomeFuncionario = mysqli_real_escape_string($conexao, $_POST['nomeFuncionario']);
    $emailFuncionario = mysqli_real_escape_string($conexao, $_POST['emailFuncionario']);
    $telefoneFuncionario = mysqli_real_escape_string($conexao, $_POST['telefoneFuncionario']);
    $sexoFuncionario = mysqli_real_escape_string($conexao, $_POST['sexoFuncionario']);
    $enderecoFuncionario = mysqli_real_escape_string($conexao, $_POST['enderecoFuncionario']);
    $dataNascFuncionario = mysqli_real_escape_string($conexao, $_POST['dataNascFuncionario']);
    $sql = "UPDATE funcionarios SET
    nomeFuncionario = '{$nomeFuncionario}',
    emailFuncionario = '{$emailFuncionario}',
    telefoneFuncionario = '{$telefoneFuncionario}',
    sexoFuncionario = '{$sexoFuncionario}',
    enderecoFuncionario = '{$enderecoFuncionario}',
    dataNascFuncionario = '{$dataNascFuncionario}'
    WHERE idFuncionario = '{$idFuncionario}'
    ";
    
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Funcionário atualizado com sucesso!</p>
                <hr>
                <a href="?menuop=funcionarios">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O funcionário não pode ser inserido.</p>
                <hr>
                <a href="?menuop=funcionarios">Voltar</a>
            </div>';
    }
?>