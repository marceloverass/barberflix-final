
<?php
    $idServico = $_POST['idServico'];
    $tituloServico = mysqli_real_escape_string($conexao, $_POST['tituloServico']);
    $descricaoServico = mysqli_real_escape_string($conexao, $_POST['descricaoServico']);
    $dataConclusaoServico = mysqli_real_escape_string($conexao, $_POST['dataConclusaoServico']);
    $horaConclusaoServico = mysqli_real_escape_string($conexao, $_POST['horaConclusaoServico']);
    $dataLembreteServico = mysqli_real_escape_string($conexao, $_POST['dataLembreteServico']);
    $horaLembreteServico = mysqli_real_escape_string($conexao, $_POST['horaLembreteServico']);
    $recorrenciaServico = mysqli_real_escape_string($conexao, $_POST['recorrenciaServico']);
    $sql = "UPDATE servicos SET
    tituloServico = '{$tituloServico}',
    descricaoServico = '{$descricaoServico}',
    dataConclusaoServico = '{$dataConclusaoServico}',
    horaConclusaoServico = '{$horaConclusaoServico}',
    dataLembreteServico = '{$dataLembreteServico}',
    horaLembreteServico = '{$horaLembreteServico}',
    recorrenciaServico = '{$recorrenciaServico}'
    WHERE idServico = '{$idServico}'
    ";
    
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Serviço atualizado com sucesso!</p>
                <hr>
                <a href="?menuop=servicos">Voltar</a>
            </div>';
        } else {
            echo '<div class="alert alert-danger margin" role="alert">
                    <h4 class="alert-heading">Erro</h4>
                    <p>O serviço não pode ser atualizado.</p>
                    <hr>
                    <a href="?menuop=servicos">Voltar</a>
                </div>';
        }
?>