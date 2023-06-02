<?php
        $tituloAgendamento = strip_tags( mysqli_real_escape_string($conexao, $_POST['tituloAgendamento']));
        $descricaoAgendamento = strip_tags( mysqli_real_escape_string($conexao, $_POST['descricaoAgendamento']));
        $dataAgendamento = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataAgendamento']));
        $horaAgendamento = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaAgendamento']));

        $sql = "INSERT INTO agendamentos (tituloAgendamento, descricaoAgendamento, dataAgendamento, horaAgendamento) VALUES ('$tituloAgendamento', '$descricaoAgendamento', '$dataAgendamento', '$horaAgendamento')";
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            ?>                
            <div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Agendamento inserido com sucesso!</p>
                <hr>
                <a href="?menuop=agendamentos">Voltar</a>
            </div>
            <?php

        } else {
            ?>
            <div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>A tarefa não pode ser inserida.</p>
                <hr>
                <a href="?menuop=agendamentos">Voltar</a>
            </div>
            <?php	
        }
?>