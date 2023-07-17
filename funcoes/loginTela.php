<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada">
    <br>
    <div>
        <form action="login.php" method="post">
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
            <button type="submit" class="btn btn-default">OK</button>
            <button type="reset" class="btn btn-default">Limpar</button>
        </form>
        </form>
    </div>
    <div>
        <a href="/bilheteria/funcoes/opcao.php" >Cadastre-se</a>
    </div>
</div>
<?php
include "../estilo/rodape.php";
?>




