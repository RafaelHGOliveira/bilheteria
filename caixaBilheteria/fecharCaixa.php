<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "caixabilheteria.php";

$fecharCaixa = new caixabilheteria();
$fecharCaixa->setValorfinal($_SESSION["total"]);
$fecharCaixa->setDatatermino(date("Y-m-d"));
date_default_timezone_set("Brazil/East");
$fecharCaixa->setHorariotermino(date("h:i:s"));
$fecharCaixa->gravarFecharCaixa();
$_SESSION["venda_liberada"] = 0;
?>

<div>
    <h1>Caixa Fechado</h1>
    <?php
    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT valorfinal, datatermino, horariotermino from caixabilheteria "
                . "where id_caixabilheteria ='" . $_SESSION["id_caixa"] . "'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>Valor Total: " . $exibe["valorfinal"] . "</td></tr>";
            if (isset($_SESSION["reembolso"]))
                echo "<tr><td>Valor Total Reembolsado: " . $_SESSION["reembolso"] . "</td></tr>";
            echo "<tr><td>Data: " . $exibe["datatermino"] . "</td></tr>";
            echo "<tr><td>Horario: " . $exibe["horariotermino"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</div>
<?php
include "../estilo/rodape.php";
?>


