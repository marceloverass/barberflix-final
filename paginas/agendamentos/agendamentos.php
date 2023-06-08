<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

    $idAgendamento = (isset($_GET['idAgendamento'])) ? $_GET['idAgendamento'] : "";
    $statusAgendamento = (isset($_GET['statusAgendamento'])  and $_GET['statusAgendamento'] == '0') ? '1' : '0';

    $sql = "UPDATE agendamentos SET statusAgendamento = '{$statusAgendamento}' WHERE idAgendamento = '{$idAgendamento}'";
    $rs = mysqli_query($conexao, $sql)
?>

<div class="margin">
    <a class="btn btn-outline-secondary mb-2 botoes" href="index.php?menuop=cad-agendamento">Novo Agendamento</a>
</div>
<div>
    <form action="index.php?menuop=agendamentos" method="POST">
        <div class="input-group mb-2">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
            <button class="btn btn-outline-secondary btn-sm botoes" type="submit">Pesquisar</button>
        </div>
    </form>
</div>
<div style="overflow-x:auto;" class="tabela">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Status</th>
                <th>Cliente</th>
                <th>Barbeiro</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data Agendada</th>
                <th>Hora Agendada</th>
                <th>Relatório</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $quantidade = 10;
                $pagina = (isset($_GET["pagina"])) ? $_GET["pagina"] : 1;
                $inicio = ($quantidade * $pagina) - $quantidade;

                $sql = "SELECT
                idAgendamento,
                statusAgendamento,
                upper(clienteAgendamento) AS clienteAgendamento,
                upper(barbeiroAgendamento) AS barbeiroAgendamento,
                tituloAgendamento,
                descricaoAgendamento,
                DATE_FORMAT(dataAgendamento, '%d/%m/%Y') AS dataAgendamento,
                horaAgendamento
                FROM agendamentos
                WHERE tituloAgendamento LIKE '%{$txt_pesquisa}%' OR 
                barbeiroAgendamento LIKE '%{$txt_pesquisa}%' OR
                DATE_FORMAT(dataAgendamento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%' OR
                horaAgendamento LIKE '%{$txt_pesquisa}%' OR
                descricaoAgendamento LIKE '%{$txt_pesquisa}%'
                ORDER BY statusAgendamento ASC, dataAgendamento ASC, horaAgendamento ASC
                LIMIT {$inicio}, {$quantidade}
                ";
                    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                    while($dados = mysqli_fetch_assoc($rs)) {         
            ?>
            <tr>
                <td class="text-center">
                    <a class="btn btn-secondary btn-sm" href="index.php?menuop=agendamentos&pagina=<?=$pagina?>&idAgendamento=<?=$dados['idAgendamento']?>&statusAgendamento=<?=$dados['statusAgendamento']?>">
                        <?php
                            if ($dados["statusAgendamento"] == 0) {
                                echo "<i class='bi bi-square'></i>";
                            } else {
                                echo "<i class='bi bi-check-square-fill'></i>";
                            }
                        ?>
                    </a>
                </td>
                <td class="text-center"><?=$dados["clienteAgendamento"] ?></td>
                <td class="text-center"><?=$dados["barbeiroAgendamento"] ?></td>
                <td class="text-center"><?=$dados["tituloAgendamento"] ?></td>
                <td class="text-center"><?=$dados["descricaoAgendamento"] ?></td>
                <td class="text-center"><?=$dados["dataAgendamento"] ?></td>
                <td class="text-center"><?=$dados["horaAgendamento"] ?></td>
                <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="gerar_relatorio.php?idAgendamento=<?=$dados['idAgendamento']?>">Baixar Relatório</a></td>
                <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="index.php?menuop=editar-agendamento&idAgendamento=<?=$dados["idAgendamento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-agendamento&idAgendamento=<?=$dados["idAgendamento"] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">

<?php
    $sqlTotal = "SELECT idAgendamento FROM agendamentos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

    echo '<li class="page-item"> <a class="page-link" href="index.php?menuop=agendamentos&pagina=1">Primeira</a> </li>';

    if ($pagina > 6) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=agendamentos&pagina=<?php echo $pagina-1?>"> < </a> </li>
        <?php
    }

    for ($i=1; $i <= $totalPagina; $i++) { 
        if($i >= ($pagina-5) && $i <= ($pagina+5)) {
            if ($i == $pagina) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i </a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?menuop=agendamentos&pagina=$i'>$i</a> </li> ";
            }
        }
    }

    if ($pagina < $totalPagina-5) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=agendamentos&pagina=<?php echo $pagina+1?>"> > </a> </li>
        <?php
    }

    echo ' <li class="page-item"> <a class="page-link" href="index.php?menuop=agendamentos&pagina='.$totalPagina.'">Última</a> </li>';
?>
</ul>

