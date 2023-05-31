<div class="margin">
    <form class="needs-validation" action="index.php?menuop=inserir-servico" method="POST" novalidate>
        <div class="mb-3">
            <label for="tituloServico" class="form-label">Título</label>
            <input type="text" class="form-control" name="tituloServico" id="tituloServico" required>
        </div>
        <div class="mb-3">
            <label for="descricaoServico" class="form-label">Descrição</label>
            <textarea name="descricaoServico" class="form-control" cols="30" rows="5" required></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoServico" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control" name="dataConclusaoServico" id="dataConclusaoServico" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaConclusaoServico" class="form-label">Hora de Conclusão</label>
                <input type="time" class="form-control" name="horaConclusaoServico" id="horaConclusaoServico" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteServico" class="form-label">Data de Lembrete</label>
                <input type="date" class="form-control" name="dataLembreteServico" id="dataLembreteServico">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteServico" class="form-label">Hora de Lembrete</label>
                <input type="time" class="form-control" name="horaLembreteServico" id="horaLembreteServico">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
            <label for="recorrenciaServico" class="form-label">Recorrência</label>
                <select name="recorrenciaServico" id="recorrenciaServico" class="form-select">
                    <option value="0">Não Recorrente</option>
                    <option value="1">Diariamente</option>
                    <option value="2">Semanalmente</option>
                    <option value="3">Mensalmente</option>
                    <option value="4">Anualmente</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>