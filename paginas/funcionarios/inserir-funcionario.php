<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $nomeFuncionario = trim($_POST['nomeFuncionario']);
    $cargoFuncionario = trim($_POST['cargoFuncionario']);
    $emailFuncionario = trim($_POST['emailFuncionario']);
    $telefoneFuncionario = trim($_POST['telefoneFuncionario']);
    $cpfFuncionario = trim($_POST['cpfFuncionario']);
    $sexoFuncionario = trim($_POST['sexoFuncionario']);
    $enderecoFuncionario = trim($_POST['enderecoFuncionario']);
    $dataNascFuncionario = trim($_POST['dataNascFuncionario']);

    if (empty($nomeFuncionario)) {
        $errors[] = "O campo 'Nome' é obrigatório.";
    }

    if (empty($cargoFuncionario)) {
        $errors[] = "O campo 'Cargo' é obrigatório.";
    }

    if (empty($emailFuncionario)) {
        $errors[] = "O campo 'E-mail' é obrigatório.";
    }

    if (empty($telefoneFuncionario)) {
        $errors[] = "O campo 'Telefone' é obrigatório.";
    }

    if (empty($cpfFuncionario)) {
        $errors[] = "O campo 'CPF' é obrigatório.";
    }

    if (empty($sexoFuncionario)) {
        $errors[] = "O campo 'Sexo' é obrigatório.";
    }

    if (empty($enderecoFuncionario)) {
        $errors[] = "O campo 'Endereço' é obrigatório.";
    }

    if (empty($dataNascFuncionario)) {
        $errors[] = "O campo 'Data de Nascimento' é obrigatório.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger margin" role="alert">' . $error . '</div>';
        }
        echo '<a href="?menuop=cad-funcionario">Voltar</a>';
    } else {
        $nomeFuncionario = mysqli_real_escape_string($conexao, $nomeFuncionario);
        $cargoFuncionario = mysqli_real_escape_string($conexao, $cargoFuncionario);
        $emailFuncionario = mysqli_real_escape_string($conexao, $emailFuncionario);
        $telefoneFuncionario = mysqli_real_escape_string($conexao, $telefoneFuncionario);
        $cpfFuncionario = mysqli_real_escape_string($conexao, $cpfFuncionario);
        $sexoFuncionario = mysqli_real_escape_string($conexao, $sexoFuncionario);
        $enderecoFuncionario = mysqli_real_escape_string($conexao, $enderecoFuncionario);
        $dataNascFuncionario = mysqli_real_escape_string($conexao, $dataNascFuncionario);

        $sql = "INSERT INTO funcionarios (nomeFuncionario, cargoFuncionario, emailFuncionario, telefoneFuncionario, cpfFuncionario, sexoFuncionario, enderecoFuncionario, dataNascFuncionario) VALUES ('$nomeFuncionario', '$cargoFuncionario', '$emailFuncionario', '$telefoneFuncionario', '$cpfFuncionario', '$sexoFuncionario', '$enderecoFuncionario', '$dataNascFuncionario')";
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            echo '<div class="alert alert-success margin" role="alert">
                    <h4 class="alert-heading">Feito!!</h4>
                    <p>Funcionário inserido com sucesso!</p>
                    <hr>
                    <a href="?menuop=funcionarios">Voltar</a>
                </div>';
        } else {
            echo '<div class="alert alert-danger margin" role="alert">
                    <h4 class="alert-heading">Erro</h4>
                    <p>O funcionário não pode ser inserido.</p>
                    <hr>
                    <a href="?menuop=funcionarios">Voltar</a>
                </div>';
        }
    }
}
?>
