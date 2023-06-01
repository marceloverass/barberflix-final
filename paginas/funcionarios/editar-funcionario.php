<?php
    $idFuncionario = $_GET['idFuncionario'];
    
    $sql = "SELECT * FROM funcionarios WHERE idFuncionario = {$idFuncionario}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro!" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>


<div class="margin">
    <form class="needs-validation" action="index.php?menuop=atualizar-funcionario" method="POST" novalidate>
        <div class="mb-3 col-1">
            <label class="form-label" for="idFuncionario">ID</label>
            <input class="form-control text-center" type="text" name="idFuncionario" value="<?=$dados["idFuncionario"]?>" readonly>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="nomeFuncionario">Nome</label>
            <input class="form-control" type="text" name="nomeFuncionario" value="<?=$dados["nomeFuncionario"]?>" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="emailFuncionario">E-mail</label>
            <input class="form-control" type="email" name="emailFuncionario" value="<?=$dados["emailFuncionario"]?>" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Digite um e-mail válido</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="telefoneFuncionario">Telefone</label>
            <input class="form-control" type="text" name="telefoneFuncionario" value="<?=$dados["telefoneFuncionario"]?>" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="enderecoFuncionario">Endereço</label>
            <input class="form-control" type="text" name="enderecoFuncionario" value="<?=$dados["enderecoFuncionario"]?>" required>
            <div class="valid-feedback">OK!</div>
            <div class="invalid-feedback">Campo obrigatório</div>
        </div>
        <div class="row">
            <div class="mb-3 col-2">
                <label class="form-label" for="dataNascFuncionario">Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascFuncionario" value="<?=$dados["dataNascFuncionario"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="mb-3 col-2">
                <label class="form-label" for="sexoFuncionario">Sexo</label>
                <select class="form-select" name="sexoFuncionario" id="sexoFuncionario" required>
                    <option <?php echo ($dados['sexoFuncionario'] == '') ? 'selected' : '' ?> value="" selected>Selecione</option>
                    <option <?php echo ($dados['sexoFuncionario'])== 'M' ? 'selected' : '' ?> value="M">Masculino</option>
                    <option <?php echo ($dados['sexoFuncionario'])== 'F' ? 'selected' : '' ?> value="F">Feminino</option>
                </select>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Selecione um gênero</div>
            </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-outline-secondary botoes variation" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>