<?php
    $idAgendamento = $_GET['idAgendamento'];

    $sql = "DELETE FROM agendamentos WHERE idAgendamento = '{$idAgendamento}'";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Agendamento excluído com sucesso!</p>
                <hr>
                <a href="?menuop=agendamentos">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O agendamento não pode ser excluído.</p>
                <hr>
                <a href="?menuop=agendamentos">Voltar</a>
            </div>';
    }
?>