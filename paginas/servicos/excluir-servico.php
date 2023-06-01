<?php
    $idServico = $_GET['idServico'];

    $sql = "DELETE FROM servicos WHERE idServico = '{$idServico}'";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Serviço excluído com sucesso!</p>
                <hr>
                <a href="?menuop=servicos">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O serviço não pode ser excluído.</p>
                <hr>
                <a href="?menuop=servicos">Voltar</a>
            </div>';
    }
?>