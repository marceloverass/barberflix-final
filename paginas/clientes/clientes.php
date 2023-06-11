<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";
?>

<div class="margin">
    <a class="btn btn-outline-secondary mb-2 botoes" href="index.php?menuop=cad-cliente">Novo Cliente</a>
    <a class="btn btn-outline-secondary mb-2 botoes" href="gerar-planilha-clientes.php">Baixar Relatório</a>
</div>
<div>
    <form action="index.php?menuop=clientes" method="POST">
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
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Sexo</th>
                <th>Endereço</th>
                <th>Data de Nasc.</th>
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
                idCliente,
                upper(nomeCliente) AS nomeCliente,
                lower(emailCliente) AS emailCliente,
                telefoneCliente,
                upper(enderecoCliente) AS enderecoCliente,
                CASE
                    WHEN sexoCliente='M' THEN 'Masculino'
                    WHEN sexoCliente='F' THEN 'Feminino'
                ELSE '-'
                END AS 'sexoCliente',
                CASE
                    WHEN dataNascCliente = '0000-00-00' THEN '-'
                ELSE DATE_FORMAT(dataNascCliente, '%d/%m/%Y')
                END AS 'dataNascCliente'
                FROM clientes
                WHERE
                nomeCliente LIKE '%{$txt_pesquisa}%' or
                emailCliente LIKE '%{$txt_pesquisa}%' or
                telefoneCliente LIKE '%{$txt_pesquisa}%' or
                sexoCliente LIKE '%{$txt_pesquisa}%' or
                enderecoCliente LIKE '%{$txt_pesquisa}%' or
                DATE_FORMAT(dataNascCliente, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
                ORDER BY nomeCliente ASC
                LIMIT {$inicio}, {$quantidade}
                ";
                    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                    while($dados = mysqli_fetch_assoc($rs)) {         
            ?>
            <tr>
                <td><?=$dados["idCliente"] ?></td>
                <td><?=$dados["nomeCliente"] ?></td>
                <td><?=$dados["emailCliente"] ?></td>
                <td><?=$dados["telefoneCliente"] ?></td>
                <td><?=$dados["sexoCliente"] ?></td>
                <td><?=$dados["enderecoCliente"] ?></td>
                <td class="text-center"><?=$dados["dataNascCliente"] ?></td>
                <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="index.php?menuop=editar-cliente&idCliente=<?=$dados["idCliente"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-cliente&idCliente=<?=$dados["idCliente"] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr >
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
  <?php
  $sqlTotal = "SELECT idCliente FROM clientes";
  $qrTotal = mysqli_query($conexao, $sqlTotal) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
  $numTotal = mysqli_num_rows($qrTotal);
  $totalPagina = ceil($numTotal / $quantidade);

  // Verifica se há mais de uma página
  if ($totalPagina > 1) {
    $paginaAnterior = max(1, $pagina - 1);
    $paginaSeguinte = min($totalPagina, $pagina + 1);

    echo '<li class="page-item"> <a class="page-link" href="index.php?menuop=clientes&pagina=1">Primeira</a> </li>';

    if ($pagina > 1) {
      echo '<li class="page-item"><a class="page-link" href="?menuop=clientes&pagina=' . $paginaAnterior . '"> < </a></li>';
    }

    $primeiraPagina = max(1, $pagina - 2);
    $ultimaPagina = min($primeiraPagina + 4, $totalPagina);

    for ($i = $primeiraPagina; $i <= $ultimaPagina; $i++) {
      if ($i == $pagina) {
        echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
      } else {
        echo '<li class="page-item"><a class="page-link" href="?menuop=clientes&pagina=' . $i . '">' . $i . '</a></li>';
      }
    }

    if ($pagina < $totalPagina) {
      echo '<li class="page-item"><a class="page-link" href="?menuop=clientes&pagina=' . $paginaSeguinte . '"> > </a></li>';
    }

    echo '<li class="page-item"> <a class="page-link" href="index.php?menuop=clientes&pagina=' . $totalPagina . '">Última</a> </li>';
  }
  ?>
</ul>