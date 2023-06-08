<?php
    $idCliente = $_GET['idCliente'];

    $sql = "SELECT * FROM clientes WHERE idCliente = {$idCliente}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro!" . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>

<div class="container">
    <form class="needs-validation" action="index.php?menuop=atualizar-cliente" method="POST" novalidate>
        <div class="row">
            <div class="mb-3 col-md-2">
                <label class="form-label" for="idCliente">ID</label>
                <input class="form-control text-center" type="text" name="idCliente" value="<?=$dados["idCliente"]?>" readonly>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label" for="nomeCliente">Nome</label>
                <input class="form-control" type="text" name="nomeCliente" value="<?=$dados["nomeCliente"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="emailCliente">E-mail</label>
                <input class="form-control" type="email" name="emailCliente" value="<?=$dados["emailCliente"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="telefoneCliente">Telefone</label>
                <input class="form-control" type="text" name="telefoneCliente" value="<?=$dados["telefoneCliente"]?>" required>
                <div class="valid-feedback">OK!</div>
                <div class="invalid-feedback">Campo obrigatório</div>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="enderecoCliente">Endereço</label>
                <input class="form-control" type="text" name="enderecoCliente" value="<?=$dados["enderecoCliente"]?>">
                <div class="valid-feedback">Não obrigatório :)</div>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="dataNascCliente">Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascCliente" value="<?=$dados["dataNascCliente"]?>">
                <div class="valid-feedback">Não obrigatório :)</div>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="sexoCliente">Sexo</label>
                <select class="form-select" name="sexoCliente" id="sexoCliente" required>
                    <option <?php echo ($dados['sexoCliente'] == '') ? 'selected' : '' ?> value="" selected>Selecione</option>
                    <option <?php echo ($dados['sexoCliente'])== 'M' ? 'selected' : '' ?> value="M">Masculino</option>
                    <option <?php echo ($dados['sexoCliente'])== 'F' ? 'selected' : '' ?> value="F">Feminino</option>
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
