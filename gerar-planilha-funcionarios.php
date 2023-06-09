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
    $arquivo = 'funcionarios.xls';
    $html = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="7">Planilha de Funcionários</td>';
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

    $sql = "SELECT * FROM funcionarios";
    $rs = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_assoc($rs)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['idFuncionario'] . '</td>';
        $html .= '<td>' . $row['nomeFuncionario'] . '</td>';
        $html .= '<td>' . $row['emailFuncionario'] . '</td>';
        $html .= '<td>' . $row['telefoneFuncionario'] . '</td>';
        $html .= '<td>' . $row['sexoFuncionario'] . '</td>';
        $html .= '<td>' . $row['enderecoFuncionario'] . '</td>';
        $html .= '<td>' . $row['dataNascFuncionario'] . '</td>';
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