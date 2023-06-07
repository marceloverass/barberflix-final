<div class="margin">
    <form class="needs-validation" action="index.php?menuop=inserir-servico" method="POST" novalidate>
        <div class="mb-3 col-3">
            <label for="clienteServico" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="clienteServico" id="clienteServico" required>
        </div>
        <div class="mb-3 col-3">
            <label for="barbeiroServico" class="form-label">Barbeiro</label>
            <input type="text" class="form-control" name="barbeiroServico" id="barbeiroServico" required>
        </div>
        <div class="mb-3 col-3">
            <label for="tituloServico" class="form-label">Título</label>
            <input type="text" class="form-control" name="tituloServico" id="tituloServico" required>
        </div>
        <div class="mb-3 col-3">
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
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>