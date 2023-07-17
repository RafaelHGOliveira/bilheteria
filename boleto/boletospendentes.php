<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div style="margin-top: 50px;">

    <?php
    include "../funcoes/conecta.php";
    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT * from boleto inner join venda on boleto.id_venda = venda.id_venda "
                . "inner join espectador on logincomprador = login "
                . "inner join evento on evento.id_evento = venda.id_evento "
                . "where tipocomprador = 'espectador' "
                . "and id_espectador = " . $_SESSION["id"];
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        echo "<th>Evento</th>";
        echo "<th>Opção</th>";
        echo "</tr>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>" . $exibe["nome"] . "</td>";
            if ($exibe["pago"] == 0) {
                echo "<form action = '2viaboleto.php' method = 'post'>";
                echo "<td><button type='submit' class='btn btn-default' name='id_boleto' "
                . "value='" . $exibe["id_boleto"] . "'>Gerar 2º via do boleto</button></td>";
                echo "</form>";
            } else {
                echo "<form action = '#' method = 'post'>";
                echo "<td><button type='submit' class='btn btn-default' name='gerarvoucher' "
                . "'>Gerar Voucher</button></td>";
                echo "</form></tr>";
            }
        }
        echo "</table>";
    }
    ?>
</div>
<?php
include "../estilo/rodape.php";
?>