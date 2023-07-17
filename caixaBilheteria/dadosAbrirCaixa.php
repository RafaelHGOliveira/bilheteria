<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "caixabilheteria.php";

$valorinicial = $_POST["valorinicial"];
$id_clientebilheteria = $_SESSION["id"];

$abrirCaixa = new caixabilheteria();
$abrirCaixa->setValorinicial($valorinicial);
$abrirCaixa->setDatainicio(date("Y-m-d"));
date_default_timezone_set("Brazil/East");
$abrirCaixa->setHorarioinicio(date("h:i:sa"));
$abrirCaixa->setId_clientebilheteria($id_clientebilheteria);
$abrirCaixa->gravarAbrirCaixa();

$sql = "select id_caixabilheteria from caixabilheteria "
        . "where id_clientebilheteria = " . $abrirCaixa->getId_clientebilheteria()
        . " order by id_caixabilheteria desc limit 1";

$objeto = new conecta();
$objeto->conectar();
$conectado = $objeto->RetornaConexao();

$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);

$_SESSION["id_caixa"] = $exibe["id_caixabilheteria"];
$_SESSION["total"] = $abrirCaixa->getValorinicial();
$_SESSION["venda_liberada"] = 1;
$_SESSION["reembolso"] = 0;
?>
<div>
    <h1>Caixa Aberto!</h1>

    <?php
    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT valorinicial, datainicio, horarioinicio from caixabilheteria "
                . "where id_caixabilheteria ='" . $_SESSION["id_caixa"] . "'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>Valor Inicial: " . $exibe["valorinicial"] . "</td></tr>";
            echo "<tr><td>Data: " . $exibe["datainicio"] . "</td></tr>";
            echo "<tr><td>Horario: " . $exibe["horarioinicio"] . "</td></tr>";
        }
        echo "</table>";
    }
    echo "</table>";
    ?>
</div>

<?php
include "../estilo/rodape.php";
header("location:/bilheteria/index.php");
?>


