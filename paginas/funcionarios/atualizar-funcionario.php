<header>
    <h3>Atualizar Funcionário</h3>
</header>

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
    
    mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    echo "Funcionário atualizado com sucesso!";
?>