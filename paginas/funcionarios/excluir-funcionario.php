<?php
    $idFuncionario = mysqli_real_escape_string($conexao, $_GET['idFuncionario']);
    $sql = "DELETE FROM funcionarios WHERE idFuncionario = '{$idFuncionario}'";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao excluir o registro!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Funcionário excluído com sucesso!</p>
                <hr>
                <a href="?menuop=funcionarios">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O funcionário não pode ser excluído.</p>
                <hr>
                <a href="?menuop=funcionarios">Voltar</a>
            </div>';
    }
?>