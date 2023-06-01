<?php
$nomeCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['nomeCliente']));
$emailCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['emailCliente']));
$telefoneCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['telefoneCliente']));
$sexoCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['sexoCliente']));
$enderecoCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['enderecoCliente']));
$dataNascCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataNascCliente']));

$errors = array();

if (empty($nomeCliente)) {
    $errors[] = "O campo 'Nome' é obrigatório.";
}
if (empty($emailCliente)) {
    $errors[] = "O campo 'E-mail' é obrigatório.";
}
if (empty($telefoneCliente)) {
    $errors[] = "O campo 'Telefone' é obrigatório.";
}
if (empty($sexoCliente)) {
    $errors[] = "O campo 'Sexo' é obrigatório.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger margin" role="alert">' . $error . '</div>';
    }
    echo '<a href="index.php?menuop=cad-cliente">Voltar</a>';
} else {
    $sql = "INSERT INTO clientes (nomeCliente, emailCliente, telefoneCliente, sexoCliente, enderecoCliente, dataNascCliente) VALUES ('$nomeCliente', '$emailCliente', '$telefoneCliente', '$sexoCliente', '$enderecoCliente', '$dataNascCliente')";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    if ($rs) {
        echo '<div class="alert alert-success margin" role="alert">
                <h4 class="alert-heading">Feito!</h4>
                <p>Cliente inserido com sucesso!</p>
                <hr>
                <a href="?menuop=clientes">Voltar</a>
            </div>';
    } else {
        echo '<div class="alert alert-danger margin" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>O cliente não pode ser inserido.</p>
                <hr>
                <a href="?menuop=clientes">Voltar</a>
            </div>';
    }
}
?>
