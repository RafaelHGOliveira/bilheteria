<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../caixaBilheteria/caixabilheteria.php";

?>
<div class="divEstilizada">
    <h2>Bilheteria</h2>
    <div>
        <form action="dadosBilheteria.php" method="post">
            <br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" placeholder="Digite nome completo">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="endereco">Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="login">Login:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Digite seu login desejado">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-default">Enviar Solicitação</button>
            <button type="reset" class="btn btn-default">Limpar</button>
        </form>
    </div>
</div>

<?php
include "../estilo/rodape.php";
?>


