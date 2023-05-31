
<?php
    $idCliente = mysqli_real_escape_string($conexao, $_GET['idCliente']);
    $sql = "DELETE FROM clientes WHERE idCliente = '{$idCliente}'";

    mysqli_query($conexao, $sql) or die("Erro ao excluir o registro!" . mysqli_error($conexao));
    echo "<br> Registro excluído com sucesso! <br><br> Volte para <a href='index.php?menuop=clientes'>Clientes</a>";
?>