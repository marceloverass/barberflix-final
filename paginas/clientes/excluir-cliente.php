<?php
    $idCliente = mysqli_real_escape_string($conexao, $_GET['idCliente']);
    $sql = "DELETE FROM clientes WHERE idCliente = '{$idCliente}'";

    $rs =mysqli_query($conexao, $sql) or die("Erro ao excluir o registro!" . mysqli_error($conexao));
    
    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Cliente excluído com sucesso!</p>
                <hr>
                <a href="?menuop=clientes">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O cliente não pode ser excluído.</p>
                <hr>
                <a href="?menuop=clientes">Voltar</a>
            </div>';
    }
?>