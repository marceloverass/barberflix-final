<header>
    <h3>Atualizar Cliente</h3>
</header>

<?php
    $idCliente = $_POST['idCliente'];
    $nomeCliente = mysqli_real_escape_string($conexao, $_POST['nomeCliente']);
    $emailCliente = mysqli_real_escape_string($conexao, $_POST['emailCliente']);
    $telefoneCliente = mysqli_real_escape_string($conexao, $_POST['telefoneCliente']);
    $sexoCliente = mysqli_real_escape_string($conexao, $_POST['sexoCliente']);
    $enderecoCliente = mysqli_real_escape_string($conexao, $_POST['enderecoCliente']);
    $dataNascCliente = mysqli_real_escape_string($conexao, $_POST['dataNascCliente']);
    $sql = "UPDATE clientes SET
    nomeCliente = '{$nomeCliente}',
    emailCliente = '{$emailCliente}',
    telefoneCliente = '{$telefoneCliente}',
    sexoCliente = '{$sexoCliente}',
    enderecoCliente = '{$enderecoCliente}',
    dataNascCliente = '{$dataNascCliente}'
    WHERE idCliente = '{$idCliente}'
    ";
    
    mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    echo "Cliente atualizado com sucesso!";
?>