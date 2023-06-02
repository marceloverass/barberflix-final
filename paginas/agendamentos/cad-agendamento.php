<div class="margin">
    <form class="needs-validation" action="index.php?menuop=inserir-agendamento" method="POST" novalidate>
        <div class="mb-3 col-3">
            <label for="clienteAgendamento" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="clienteAgendamento" id="clienteAgendamento" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label for="barbeiroAgendamento" class="form-label">Barbeiro</label>
            <input type="text" class="form-control" name="barbeiroAgendamento" id="barbeiroAgendamento" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label for="tituloAgendamento" class="form-label">Título</label>
            <input type="text" class="form-control" name="tituloAgendamento" id="tituloAgendamento" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label for="descricaoAgendamento" class="form-label">Descrição</label>
            <textarea name="descricaoAgendamento" class="form-control" cols="30" rows="5"></textarea>
            <div class="valid-feedback">Não obrigatório :)</div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataAgendamento" class="form-label">Data</label>
                <input type="date" class="form-control" name="dataAgendamento" id="dataAgendamento" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaAgendamento" class="form-label">Hora</label>
                <input type="time" class="form-control" name="horaAgendamento" id="horaAgendamento" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>