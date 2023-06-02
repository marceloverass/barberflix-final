
<?php
    $idAgendamento = $_POST['idAgendamento'];
    $tituloAgendamento = mysqli_real_escape_string($conexao, $_POST['tituloAgendamento']);
    $descricaoAgendamento = mysqli_real_escape_string($conexao, $_POST['descricaoAgendamento']);
    $dataAgendamento = mysqli_real_escape_string($conexao, $_POST['dataAgendamento']);
    $horaAgendamento = mysqli_real_escape_string($conexao, $_POST['horaAgendamento']);

    $sql = "UPDATE agendamentos SET
    tituloAgendamento = '{$tituloAgendamento}',
    descricaoAgendamento = '{$descricaoAgendamento}',
    dataAgendamento = '{$dataAgendamento}',
    horaAgendamento = '{$horaAgendamento}'
    WHERE idAgendamento = '{$idAgendamento}'
    ";
    
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Agendamento atualizado com sucesso!</p>
                <hr>
                <a href="?menuop=agendamentos">Voltar</a>
            </div>';
        } else {
            echo '<div class="alert alert-danger margin" role="alert">
                    <h4 class="alert-heading">Erro</h4>
                    <p>O agendamento não pode ser atualizado.</p>
                    <hr>
                    <a href="?menuop=servicos">Voltar</a>
                </div>';
        }
?>