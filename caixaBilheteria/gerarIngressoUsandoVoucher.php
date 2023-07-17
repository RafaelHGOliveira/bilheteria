<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div class="divEstilizada" style="height: 300px">
    <h2>Gerar Ingresso Usando o Voucher</h2>
    <div>
        <form action="gerarIngresso.php" method="post">
            <div class="form-group" align="center">
                <label class="control-label col-sm-4" for="voucher">Digite o número do voucher:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="voucher" placeholder="numero do voucher">
                </div>
            </div>
            

            <div class="col-sm-10">
                <br>
                <button type="submit" class="btn btn-default">OK</button>
                <button type="reset" class="btn btn-default">Limpar</button>
            </div>
        </form>

    </div>
</div>
<?php
include "../estilo/rodape.php";
?>

