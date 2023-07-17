<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>


<div class="divEstilizada">
    <form action="dadosadm.php" method="post">
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


    <?php
    include "../estilo/rodape.php";
    ?>


