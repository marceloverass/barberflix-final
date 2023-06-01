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
    
   $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

   if ($rs) {
    echo '<div class="alert alert-success margin" role="alert">
            <h4 class="alert-heading">Feito!h4>
            <p>Cliente atualizado com sucesso!</p>
            <hr>
            <a href="?menuop=clientes">Voltar</a>
        </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O cliente não pode ser atualizado.</p>
                <hr>
                <a href="?menuop=clientes">Voltar</a>
            </div>';
    }
?>