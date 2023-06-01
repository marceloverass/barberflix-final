
<div class="margin">
    <form class="needs-validation" action="index.php?menuop=inserir-cliente" method="POST" novalidate>
        <div class="mb-3 col-3">
            <label class="form-label" for="nomeCliente">Nome</label>
            <input class="form-control" type="text" name="nomeCliente" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="emailCliente">E-mail</label>
            <input class="form-control" type="email" name="emailCliente"  required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Digite um e-mail válido.</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="telefoneCliente">Telefone</label>
            <input class="form-control" type="text" name="telefoneCliente" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="enderecoCliente">Endereço</label>
            <input class="form-control" type="text" name="enderecoCliente">
            <div class="valid-feedback">Não obrigatório :)</div>
        </div>
        <div class="row">
            <div class="mb-3 col-2">
                <label class="form-label" for="dataNascCliente">Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascCliente">
                <div class="valid-feedback">Não obrigatório :)</div>
            </div>
            <div class="mb-3 col-2">
                <label class="form-label" for="sexoCliente">Sexo</label>
                <select class="form-select" name="sexoCliente" id="sexoCliente" required>
                    <option selected value="">Selecione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Selecione um gênero</div>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>