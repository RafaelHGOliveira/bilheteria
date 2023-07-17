<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div style="margin-top: 50px">

    <div class="divEstilizada" style="height: 250px">
        <h2>Relatório de Vendas Mensais</h2>
        <div>
            <form action="relatorioVendas.php" method="post">
                <div class="form-group" text="center">
                    <label class="control-label col-sm-4" for="datavenda">De:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="datavenda" placeholder="">
                    </div>

                    <label class="control-label col-sm-4" for="datavenda2">Até:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="datavenda2" placeholder="">
                    </div>
                </div>

                <br>                                <br>


                <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">OK</button>
                    <button type="reset" class="btn btn-default">Limpar</button>
                </div>
            </form>
        </div>
    </div>



</div>
<?php
include "../estilo/rodape.php";
?>