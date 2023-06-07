<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $clienteAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['clienteAgendamento']));
    $barbeiroAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['barbeiroAgendamento']));
    $tituloAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloAgendamento']));
    $descricaoAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoAgendamento']));
    $dataAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataAgendamento']));
    $horaAgendamento = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaAgendamento']));

    if (empty($clienteAgendamento)) {
        $errors[] = "O campo 'Cliente' é obrigatório.";
    }

    if (empty($barbeiroAgendamento)) {
        $errors[] = "O campo 'Barbeiro' é obrigatório.";
    }

    if (empty($tituloAgendamento)) {
        $errors[] = "O campo 'Título' é obrigatório.";
    }

    if (empty($descricaoAgendamento)) {
        $errors[] = "O campo 'Descrição' é obrigatório.";
    }

    if (empty($dataAgendamento)) {
        $errors[] = "O campo 'Data' é obrigatório.";
    }

    if (empty($horaAgendamento)) {
        $errors[] = "O campo 'Hora' é obrigatório.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger margin" role="alert">' . $error . '</div>';
        }
        echo '<a href="?menuop=agendamentos">Voltar</a>';
    } else {
        $clienteAgendamento = mysqli_real_escape_string($conexao, $clienteAgendamento);
        $barbeiroAgendamento = mysqli_real_escape_string($conexao, $barbeiroAgendamento);
        $tituloAgendamento = mysqli_real_escape_string($conexao, $tituloAgendamento);
        $descricaoAgendamento = mysqli_real_escape_string($conexao, $descricaoAgendamento);
        $dataAgendamento = mysqli_real_escape_string($conexao, $dataAgendamento);
        $horaAgendamento = mysqli_real_escape_string($conexao, $horaAgendamento);

        $sql = "INSERT INTO agendamentos (clienteAgendamento, barbeiroAgendamento, tituloAgendamento, descricaoAgendamento, dataAgendamento, horaAgendamento) VALUES ('$clienteAgendamento','$barbeiroAgendamento','$tituloAgendamento', '$descricaoAgendamento', '$dataAgendamento', '$horaAgendamento')";
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            echo '<div class="alert alert-success margin" role="alert">
                    <h4 class="alert-heading">Feito!</h4>
                    <p>Agendamento inserido com sucesso!</p>
                    <hr>
                    <a href="?menuop=agendamentos">Voltar</a>
                </div>';
        } else {
            echo '<div class="alert alert-danger margin" role="alert">
                    <h4 class="alert-heading">Erro</h4>
                    <p>O agendamento não pode ser inserido.</p>
                    <hr>
                    <a href="?menuop=agendamentos">Voltar</a>
                </div>';
        }
    }
}
?>
