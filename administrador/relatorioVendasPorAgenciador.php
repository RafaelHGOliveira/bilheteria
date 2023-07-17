<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div style="margin-top: 50px;">



    <?php
    include "../funcoes/conecta.php";
    $id_select = $_POST["id_select"];

    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT venda.id_venda, venda.id_evento, venda.tipopagamento,venda.cadeira, venda.datavenda from venda inner join evento on "
                . "venda.id_evento = evento.id_evento where evento.id_agenciador = '" . $id_select . "'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        echo "<tr><th>Id Venda</th>";
        echo "<th>Id Evento</th>";
        echo "<th>Tipo de Pagamento</th>";
        echo "<th>Cadeira</th>";
        echo "<th>Data da Venda</th>";
        echo "</tr>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>" . $exibe["id_venda"] . "</td>";
            echo "<td>" . $exibe["id_evento"] . "</td>";
            echo "<td>" . $exibe["tipopagamento"] . "</td>";
            echo "<td>" . $exibe["cadeira"] . "</td>";
            echo "<td>" . $exibe["datavenda"] . "</td>";
        }
        echo "</table>";
    }
    ?>
</div>
<?php
include "../estilo/rodape.php";
?>