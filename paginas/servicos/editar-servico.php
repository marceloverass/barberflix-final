<?php
    $idServico = $_GET['idServico'];
    
    $sql = "SELECT * FROM servicos WHERE idServico = {$idServico}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro!" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>

<div class="margin">
    <form class="needs-validation" action="index.php?menuop=atualizar-servico" method="POST" novalidate>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="idServico" class="form-label">ID</label>
                <input type="text" class="form-control text-center" name="idServico" id="idServico" value="<?=$dados["idServico"]?>" required readonly>
            </div>
            <div class="col-md-5 mb-3">
                <label for="clienteServico" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="clienteServico" id="clienteServico" value="<?=$dados["clienteServico"]?>" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="barbeiroServico" class="form-label">Barbeiro</label>
                <input type="text" class="form-control" name="barbeiroServico" id="barbeiroServico" value="<?=$dados["barbeiroServico"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tituloServico" class="form-label">Título</label>
                <input type="text" class="form-control" name="tituloServico" id="tituloServico" value="<?=$dados["tituloServico"]?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="descricaoServico" class="form-label">Descrição</label>
                <textarea name="descricaoServico" class="form-control" cols="30" rows="5" required><?=$dados["descricaoServico"]?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="dataConclusaoServico" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control" name="dataConclusaoServico" id="dataConclusaoServico" value="<?=$dados["dataConclusaoServico"]?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="horaConclusaoServico" class="form-label">Hora de Conclusão</label>
                <input type="time" class="form-control" name="horaConclusaoServico" id="horaConclusaoServico" value="<?=$dados["horaConclusaoServico"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <input class="btn btn-outline-secondary botoes variation" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </div>
    </form>
</div>