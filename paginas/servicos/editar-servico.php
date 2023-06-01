<?php
    $idServico = $_GET['idServico'];
    
    $sql = "SELECT * FROM servicos WHERE idServico = {$idServico}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro!" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>

<div class="margin">
    <form class="needs-validation" action="index.php?menuop=atualizar-servico" method="POST" novalidate>
        <div class="mb-3 col-1">
            <label for="idServico" class="form-label">ID</label>
            <input type="text" class="form-control text-center" name="idServico" id="idServico" value="<?=$dados["idServico"]?>" required readonly>
        </div>
        <div class="mb-3 col-3">
            <label for="tituloServico" class="form-label">Título</label>
            <input type="text" class="form-control" name="tituloServico" id="tituloServico" value="<?=$dados["tituloServico"]?>" required>
        </div>
        <div class="mb-3 col-3">
            <label for="descricaoServico" class="form-label">Descrição</label>
            <textarea name="descricaoServico" class="form-control" cols="30" rows="5" required><?=$dados["descricaoServico"]?></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoServico" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control" name="dataConclusaoServico" id="dataConclusaoServico" value="<?=$dados["dataConclusaoServico"]?>" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaConclusaoServico" class="form-label">Hora de Conclusão</label>
                <input type="time" class="form-control" name="horaConclusaoServico" id="horaConclusaoServico" value="<?=$dados["horaConclusaoServico"]?>" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteServico" class="form-label">Data de Lembrete</label>
                <input type="date" class="form-control" name="dataLembreteServico" id="dataLembreteServico" value="<?=$dados["dataLembreteServico"]?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteServico" class="form-label">Hora de Lembrete</label>
                <input type="time" class="form-control" name="horaLembreteServico" id="horaLembreteServico" value="<?=$dados["horaLembreteServico"]?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
            <label for="recorrenciaServico" class="form-label">Recorrência</label>
                <select name="recorrenciaServico" id="recorrenciaServico" class="form-select">
                    <option value="0" <?php echo ($dados["recorrenciaServico"] = 0 ) ? "selected": "" ?>>Não Recorrente</option>
                    <option value="1" <?php echo ($dados["recorrenciaServico"] = 1 ) ? "selected": "" ?>>Diariamente</option>
                    <option value="2" <?php echo ($dados["recorrenciaServico"] = 2 ) ? "selected": "" ?>>Semanalmente</option>
                    <option value="3" <?php echo ($dados["recorrenciaServico"] = 3 ) ? "selected": "" ?>>Mensalmente</option>
                    <option value="4" <?php echo ($dados["recorrenciaServico"] = 4 ) ? "selected": "" ?>>Anualmente</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>