<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div class="divEstilizada" style="height: 250px; text-align: left">
    <h2 style="text-align: center">Caixa da Bilheteria</h2>
    <div>
        <form action="dadosAbrirCaixa.php" method="post">
            <br>
            <div class="form-group">
                <label class="control-label col-sm-4" for="valorinicial">Valor Inicial:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="valorinicial" placeholder="Digite valor o inicial do caixa">
                </div>
            </div>
    </div>
    <br>
    <br><br><br>

    <div class="col-sm-10" style="text-align: center">
        <button type="submit" class="btn btn-default">OK</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </div>

</form>
<br>
<div class="form-group">

</div>
<br>
</form>
</div>
</div>
</html>
<?php
include "../estilo/rodape.php";
?>