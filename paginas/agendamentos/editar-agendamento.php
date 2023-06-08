<?php
    $idAgendamento = $_GET['idAgendamento'];
    
    $sql = "SELECT * FROM agendamentos WHERE idAgendamento = {$idAgendamento}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro!" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>

<div class="margin">
    <form class="needs-validation" action="index.php?menuop=atualizar-agendamento" method="POST" novalidate>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="idAgendamento" class="form-label">ID</label>
                <input type="text" class="form-control text-center" name="idAgendamento" id="idAgendamento" value="<?=$dados["idAgendamento"]?>" required readonly>
            </div>
            <div class="col-md-5 mb-3">
                <label for="clienteAgendamento" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="clienteAgendamento" id="clienteAgendamento" value="<?=$dados["clienteAgendamento"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="barbeiroAgendamento" class="form-label">Barbeiro</label>
                <input type="text" class="form-control" name="barbeiroAgendamento" id="barbeiroAgendamento" value="<?=$dados["barbeiroAgendamento"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tituloAgendamento" class="form-label">Título</label>
                <input type="text" class="form-control" name="tituloAgendamento" id="tituloAgendamento" value="<?=$dados["tituloAgendamento"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="descricaoAgendamento" class="form-label">Descrição</label>
                <textarea name="descricaoAgendamento" class="form-control" cols="30" rows="5"><?=$dados["descricaoAgendamento"]?></textarea>
                <div class="valid-feedback">OK!</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="dataAgendamento" class="form-label">Data Agendada</label>
                <input type="date" class="form-control" name="dataAgendamento" id="dataAgendamento" value="<?=$dados["dataAgendamento"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="horaAgendamento" class="form-label">Hora Agendada</label>
                <input type="time" class="form-control" name="horaAgendamento" id="horaAgendamento" value="<?=$dados["horaAgendamento"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <input class="btn btn-outline-secondary botoes variation" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </div>
    </form>
</div>