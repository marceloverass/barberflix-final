<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

    $idServico = (isset($_GET['idServico'])) ? $_GET['idServico'] : "";
    $statusServico = (isset($_GET['statusServico'])  and $_GET['statusServico'] == '0') ? '1' : '0';

    $sql = "UPDATE servicos SET statusServico = '{$statusServico}' WHERE idServico = '{$idServico}'";
    $rs = mysqli_query($conexao, $sql)
?>

<div class="margin">
    <a class="btn btn-outline-secondary mb-2 botoes" href="index.php?menuop=cad-servico">Novo Serviço</a>
</div>
<div>
    <form action="index.php?menuop=servicos" method="POST">
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
                <th>Pagamento</th>
                <th>Cliente</th>
                <th>Barbeiro</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data Conclusão</th>
                <th>Hora Conclusão</th>
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
                idServico,
                statusServico,
                clienteServico,
                barbeiroServico,
                tituloServico,
                descricaoServico,
                DATE_FORMAT(dataConclusaoServico, '%d/%m/%Y') AS dataConclusaoServico,
                horaConclusaoServico
                FROM servicos
                WHERE tituloServico LIKE '%{$txt_pesquisa}%' OR
                descricaoServico LIKE '%{$txt_pesquisa}%' OR
                clienteServico LIKE '%{$txt_pesquisa}%' OR
                barbeiroServico LIKE '%{$txt_pesquisa}%' OR 
                DATE_FORMAT(dataConclusaoServico, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
                ORDER BY statusServico ASC, DATE_FORMAT(dataConclusaoServico, '%d/%m/%Y') DESC, horaConclusaoServico DESC
                LIMIT {$inicio}, {$quantidade}
                ";
                    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                    while($dados = mysqli_fetch_assoc($rs)) {         
            ?>
            <tr>
                <td class="text-center">
                    <a class="btn btn-secondary btn-sm" href="index.php?menuop=servicos&pagina=<?=$pagina?>&idServico=<?=$dados['idServico']?>&statusServico=<?=$dados['statusServico']?>">
                        <?php
                            if ($dados["statusServico"] == 0) {
                                echo "<i class='bi bi-square'></i>";
                            } else {
                                echo "<i class='bi bi-check-square-fill'></i>";
                            }
                        ?>
                    </a>
                </td>
                <td class="text-center"><?=$dados["clienteServico"] ?></td>
                <td class="text-center"><?=$dados["barbeiroServico"] ?></td>
                <td class="text-center"><?=$dados["tituloServico"] ?></td>
                <td class="text-center"><?=$dados["descricaoServico"] ?></td>
                <td class="text-center"><?=$dados["dataConclusaoServico"] ?></td>
                <td class="text-center"><?=$dados["horaConclusaoServico"] ?></td>
                <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="index.php?menuop=editar-servico&idServico=<?=$dados["idServico"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-servico&idServico=<?=$dados["idServico"] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">

<?php
    $sqlTotal = "SELECT idServico FROM servicos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

    echo '<li class="page-item"> <a class="page-link" href="index.php?menuop=servicos&pagina=1">Primeira</a> </li>';

    if ($pagina > 6) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=servicos&pagina=<?php echo $pagina-1?>"> < </a> </li>
        <?php
    }

    for ($i=1; $i <= $totalPagina; $i++) { 
        if($i >= ($pagina-5) && $i <= ($pagina+5)) {
            if ($i == $pagina) {
                echo "<li class='page-item active'><a class='page-link' href='#'>$i </a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?menuop=servicos&pagina=$i'>$i</a> </li> ";
            }
        }
    }

    if ($pagina < $totalPagina-5) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=servicos&pagina=<?php echo $pagina+1?>"> > </a> </li>
        <?php
    }

    echo ' <li class="page-item"> <a class="page-link" href="index.php?menuop=servicos&pagina='.$totalPagina.'">Última</a> </li>';
?>
</ul>