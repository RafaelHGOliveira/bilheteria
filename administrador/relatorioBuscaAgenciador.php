
<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../funcoes/conecta.php";
$objeto = new conecta();

if ($objeto->conectar() == 0) {
    $conectado = $objeto->RetornaConexao();

    $sql = "SELECT id_agenciador, nome from agenciador where ativo = 1 ";
    $rs = mysqli_query($conectado, $sql);
}
?>
<div style="margin-top: 50px">

    <div class="divEstilizada" style="height: 250px">
        <h2>Relatório de Vendas por Agenciador</h2>
        <br><br><br>
        <div>
            <form action="relatorioVendasPorAgenciador.php" method="post">
                <div class="form-group" text="center">
                    <label class="control-label col-sm-4">Selecione um Agenciador:</label>
                    <select name="id_select">
                        <?php while ($exibe = mysqli_fetch_assoc($rs)) { ?>
                            <option value="<?php echo $exibe["id_agenciador"] ?>"><?php echo $exibe["nome"] ?></option>
                        <?php } ?>

                    </select>

                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">OK</button>

                </div>

            </form>

        </div>

    </div>
</div>
<?php
include "../estilo/rodape.php";
?>
