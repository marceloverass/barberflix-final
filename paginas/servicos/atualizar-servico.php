
<?php
    $idServico = $_POST['idServico'];
    $clienteServico = mysqli_real_escape_string($conexao, $_POST['clienteServico']);
    $barbeiroServico = mysqli_real_escape_string($conexao, $_POST['barbeiroServico']);
    $tituloServico = mysqli_real_escape_string($conexao, $_POST['tituloServico']);
    $descricaoServico = mysqli_real_escape_string($conexao, $_POST['descricaoServico']);
    $dataConclusaoServico = mysqli_real_escape_string($conexao, $_POST['dataConclusaoServico']);
    $horaConclusaoServico = mysqli_real_escape_string($conexao, $_POST['horaConclusaoServico']);

    $sql = "UPDATE servicos SET
    clienteServico = '{$clienteServico}',
    barbeiroServico = '{$barbeiroServico}',
    tituloServico = '{$tituloServico}',
    descricaoServico = '{$descricaoServico}',
    dataConclusaoServico = '{$dataConclusaoServico}',
    horaConclusaoServico = '{$horaConclusaoServico}'
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