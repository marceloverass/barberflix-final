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
    $arquivo = 'servicos.xls';
    // Crie a tabela HTML com os dados da tabela de servicos
    $html = '';
    $html .= '<table border="1">';
    $html .= '<tr>';
    $html .= '<td colspan="8">Planilha de Serviços</td>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td><b>ID</b></td>';
    $html .= '<td><b>Status</b></td>';
    $html .= '<td><b>Cliente</b></td>';
    $html .= '<td><b>Barbeiro</b></td>';
    $html .= '<td><b>Título</b></td>';
    $html .= '<td><b>Descrição</b></td>';
    $html .= '<td><b>Data Concluída</b></td>';
    $html .= '<td><b>Hora Concluída</b></td>';
    $html .= '</tr>';

    $sql = "SELECT * FROM servicos";
    $rs = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_assoc($rs)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['idServico'] . '</td>';
        $html .= '<td>' . $row['statusServico'] . '</td>';
        $html .= '<td>' . $row['clienteServico'] . '</td>';
        $html .= '<td>' . $row['barbeiroServico'] . '</td>';
        $html .= '<td>' . $row['tituloServico'] . '</td>';
        $html .= '<td>' . $row['descricaoServico'] . '</td>';
        $html .= '<td>' . $row['dataConclusaoServico'] . '</td>';
        $html .= '<td>' . $row['horaConclusaoServico'] . '</td>';
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