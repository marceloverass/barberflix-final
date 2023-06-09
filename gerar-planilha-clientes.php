<?php
include_once("././db/conexao.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $arquivo = 'clientes.xls';
    $html = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="7">Planilha de Clientes</td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><b>ID</b></td>';
    $html .= '<td><b>Nome</b></td>';
    $html .= '<td><b>Email</b></td>';
    $html .= '<td><b>Telefone</b></td>';
    $html .= '<td><b>Sexo</b></td>';
    $html .= '<td><b>Endereço</b></td>';
    $html .= '<td><b>dataNascFuncionario</b></td>';
    $html .= '</tr>';

    $sql = "SELECT * FROM clientes";
    $rs = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_assoc($rs)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['idCliente'] . '</td>';
        $html .= '<td>' . $row['nomeCliente'] . '</td>';
        $html .= '<td>' . $row['emailCliente'] . '</td>';
        $html .= '<td>' . $row['telefoneCliente'] . '</td>';
        $html .= '<td>' . $row['sexoCliente'] . '</td>';
        $html .= '<td>' . $row['enderecoCliente'] . '</td>';
        $html .= '<td>' . $row['dataNascCliente'] . '</td>';
        $html .= '</tr>';
    }

    // Defina o cabeçalho do arquivo Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"{$arquivo}\"");

    // Remova o conteúdo HTML desnecessário
    echo $html;
    exit;
?>
</body>
</html>