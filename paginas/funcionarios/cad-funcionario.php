<div class="margin">
    <a class="btn btn-outline-secondary mb-5 botoes" href="index.php?menuop=funcionarios">Voltar</a>
    <form class="needs-validation" action="index.php?menuop=inserir-funcionario" method="POST" novalidate>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label" for="nomeFuncionario">Nome</label>
                <input class="form-control" type="text" name="nomeFuncionario" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label" for="emailFuncionario">E-mail</label>
                <input class="form-control" type="email" name="emailFuncionario" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Digite um e-mail válido</div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label" for="telefoneFuncionario">Telefone</label>
                <input class="form-control" type="text" name="telefoneFuncionario" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label" for="enderecoFuncionario">Endereço</label>
                <input class="form-control" type="text" name="enderecoFuncionario" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 mb-3">
                <label class="form-label" for="dataNascFuncionario">Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascFuncionario" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="col-md-2 mb-3">
                <label class="form-label" for="sexoFuncionario">Sexo</label>
                <select class="form-select" name="sexoFuncionario" id="sexoFuncionario" required>
                    <option selected value="">Selecione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Selecione um gênero</div>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <input class="btn btn-outline-secondary botoes variation" type="submit" value="Adicionar" name="btnAdicionar">
            </div>
        </div>
    </form>
</div>