<?php
$nomeCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['nomeCliente']));
$emailCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['emailCliente']));
$telefoneCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['telefoneCliente']));
$sexoCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['sexoCliente']));
$enderecoCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['enderecoCliente']));
$dataNascCliente = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataNascCliente']));

$errors = array();

// Verifica se os campos obrigatórios estão preenchidos
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

// Se houver erros, exibe as mensagens de erro
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger margin" role="alert">' . $error . '</div>';
    }
    echo '<a href="index.php?menuop=cad-cliente">Voltar</a>';
} else {
    // Todos os campos foram preenchidos corretamente, realizar a inserção do cliente
    $sql = "INSERT INTO clientes (nomeCliente, emailCliente, telefoneCliente, sexoCliente, enderecoCliente, dataNascCliente) VALUES ('$nomeCliente', '$emailCliente', '$telefoneCliente', '$sexoCliente', '$enderecoCliente', '$dataNascCliente')";

    mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));

    echo "<br>Cliente inserido com sucesso! <br><br> Volte para <a href='index.php?menuop=clientes'>Clientes</a>";
}
?>
