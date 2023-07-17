<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div style="margin-top: 50px;">


    <?php
    include "../funcoes/conecta.php";
    $datavenda = $_POST["datavenda"];
    $datavenda2 = $_POST["datavenda2"];
    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT id_venda, id_evento, tipopagamento,cadeira, datavenda from venda where datavenda >= '" . $datavenda . "' and datavenda <= '" . $datavenda2 . "' ";
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