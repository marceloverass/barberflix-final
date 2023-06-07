<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $clienteServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['clienteServico']));
    $barbeiroServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['barbeiroServico']));
    $tituloServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloServico']));
    $descricaoServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoServico']));
    $dataConclusaoServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataConclusaoServico']));
    $horaConclusaoServico = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaConclusaoServico']));

    if (empty($clienteServico)) {
        $errors[] = "O campo 'Cliente' é obrigatório.";
    }
    if (empty($barbeiroServico)) {
        $errors[] = "O campo 'Barbeiro' é obrigatório.";
    }
    if (empty($tituloServico)) {
        $errors[] = "O campo 'Título' é obrigatório.";
    }

    if (empty($descricaoServico)) {
        $errors[] = "O campo 'Descrição' é obrigatório.";
    }

    if (empty($dataConclusaoServico)) {
        $errors[] = "O campo 'Data de Conclusão' é obrigatório.";
    }

    if (empty($horaConclusaoServico)) {
        $errors[] = "O campo 'Hora de Conclusão' é obrigatório.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger margin" role="alert">' . $error . '</div>';
        }
        echo '<a href="?menuop=servicos">Voltar</a>';
    } else {
        $clienteServico = mysqli_real_escape_string($conexao, $clienteServico);
        $barbeiroServico = mysqli_real_escape_string($conexao, $barbeiroServico);
        $tituloServico = mysqli_real_escape_string($conexao, $tituloServico);
        $descricaoServico = mysqli_real_escape_string($conexao, $descricaoServico);
        $dataConclusaoServico = mysqli_real_escape_string($conexao, $dataConclusaoServico);
        $horaConclusaoServico = mysqli_real_escape_string($conexao, $horaConclusaoServico);

        $sql = "INSERT INTO servicos (clienteServico, barbeiroServico, tituloServico, descricaoServico, dataConclusaoServico, horaConclusaoServico) VALUES ('$clienteServico', '$barbeiroServico', '$tituloServico', '$descricaoServico', '$dataConclusaoServico', '$horaConclusaoServico')";
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            echo '<div class="alert alert-success margin" role="alert">
                    <h4 class="alert-heading">Feito!</h4>
                    <p>Serviço inserido com sucesso!</p>
                    <hr>
                    <a href="?menuop=servicos">Voltar</a>
                </div>';
        } else {
            echo '<div class="alert alert-danger margin" role="alert">
                    <h4 class="alert-heading">Erro</h4>
                    <p>O serviço não pode ser inserido.</p>
                    <hr>
                    <a href="?menuop=servicos">Voltar</a>
                </div>';
        }
    }
}
?>