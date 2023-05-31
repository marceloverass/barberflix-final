<?php
        $tituloServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['tituloServico']));
        $descricaoServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['descricaoServico']));
        $dataConclusaoServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataConclusaoServico']));
        $horaConclusaoServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaConclusaoServico']));
        $dataLembreteServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataLembreteServico']));
        $horaLembreteServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaLembreteServico']));
        $recorrenciaServico = strip_tags( mysqli_real_escape_string($conexao, $_POST['recorrenciaServico']));

        $sql = "INSERT INTO servicos (tituloServico, descricaoServico, dataConclusaoServico, horaConclusaoServico, dataLembreteServico, horaLembreteServico, recorrenciaServico) VALUES ('$tituloServico', '$descricaoServico', '$dataConclusaoServico', '$horaConclusaoServico', '$dataLembreteServico', '$horaLembreteServico', '$recorrenciaServico')";
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            ?>                
            <div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Parabéns!!</h4>
                <p>Serviço inserido com sucesso!</p>
                <hr>
                <a href="?menuop=servicos">Voltar</a>
            </div>
            <?php

        } else {
            ?>
            <div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>A tarefa não pode ser inserida.</p>
                <hr>
                <a href="?menuop=servicos">Voltar</a>
            </div>
            <?php	
        }
?>