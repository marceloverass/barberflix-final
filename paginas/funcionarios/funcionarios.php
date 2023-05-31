<div class="margin">
    <a class="btn btn-outline-secondary mb-2 botoes" href="index.php?menuop=cad-funcionario">Novo Funcionário</a>
</div>
<div>
    <form action="index.php?menuop=funcionarios" method="POST">
        <div class="input-group mb-2">
            <input class="form-control" type="text" name="txt_pesquisa">
            <button class="btn btn-outline-secondary btn-sm botoes" type="submit">Pesquisar</button>
        </div>
    </form>
</div>
<div class="tabela">
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

                $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

                $sql = "SELECT
                idFuncionario,
                upper(nomeFuncionario) AS nomeFuncionario,
                lower(emailFuncionario) AS emailFuncionario,
                telefoneFuncionario,
                upper(enderecoFuncionario) AS enderecoFuncionario,
                CASE
                    WHEN sexoFuncionario='M' THEN 'MASCULINO'
                    WHEN sexoFuncionario='F' THEN 'FEMININO'
                ELSE '-'
                END AS 'sexoFuncionario',
                CASE
                    WHEN dataNascFuncionario = '0000-00-00' THEN '-'
                ELSE DATE_FORMAT(dataNascFuncionario, '%d/%m/%Y')
                END AS 'dataNascFuncionario'
                FROM funcionarios
                WHERE
                idFuncionario='{$txt_pesquisa}' or
                nomeFuncionario LIKE '%{$txt_pesquisa}%' or
                emailFuncionario LIKE '%{$txt_pesquisa}%' or
                telefoneFuncionario LIKE '%{$txt_pesquisa}%' or
                sexoFuncionario LIKE '%{$txt_pesquisa}%' or
                enderecoFuncionario LIKE '%{$txt_pesquisa}%' or
                dataNascFuncionario LIKE '%{$txt_pesquisa}%'
                ORDER BY nomeFuncionario ASC
                LIMIT {$inicio}, {$quantidade}
                ";
                    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                    while($dados = mysqli_fetch_assoc($rs)) {         
            ?>
            <tr>
                <td><?=$dados["idFuncionario"] ?></td>
                <td><?=$dados["nomeFuncionario"] ?></td>
                <td><?=$dados["emailFuncionario"] ?></td>
                <td><?=$dados["telefoneFuncionario"] ?></td>
                <td><?=$dados["sexoFuncionario"] ?></td>
                <td><?=$dados["enderecoFuncionario"] ?></td>
                <td class="text-center"><?=$dados["dataNascFuncionario"] ?></td>
                <td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="index.php?menuop=editar-funcionario&idFuncionario=<?=$dados["idFuncionario"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-funcionario&idFuncionario=<?=$dados["idFuncionario"] ?>"><i class="bi bi-trash-fill"></a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

<br>

<?php
    $sqlTotal = "SELECT idFuncionario FROM funcionarios";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

?>
