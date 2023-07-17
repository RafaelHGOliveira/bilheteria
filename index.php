<?php

include "estilo/topo.php";
include "estilo/esquerda.php";
include "estilo/direita.php";
include "funcoes/conecta.php";
?>

<?php

$objeto = new conecta();
if ($objeto->conectar() == 0) {
    $conectado = $objeto->RetornaConexao();
    $sql = "SELECT * from evento where cancelado=0";
    $rs = mysqli_query($conectado, $sql);
    $total = mysqli_num_rows($rs);
    echo "<table class='table table-striped' style='width: 70%' align='center'>";
    echo "<tr>";
    for ($i = 0; $i < $total; $i++) {
        $exibe = mysqli_fetch_array($rs);
        if ($i % 2 == 0) {
            echo "</tr><tr>";
        }
        echo "<td>";
        echo "<table class='table table-striped' style='width: 100 %' align='left'>";
        echo "<tr><td colspan='2' align='center'><h3>" . $exibe["nome"] . "</h3></td></tr>";
        echo "<tr><td rowspan='5' align='right'><a href = '/Bilheteria/evento/infoEvento.php?id="
        . $exibe["id_evento"] . "'><img src='" . $exibe["diretorio"] . "' width=300px height=400px/></a></td><tr>";
        echo "<tr><td><b>Local: </b>" . $exibe["endereco"] . "</td></tr>";
        echo "<tr><td><b>Horário: </b>" . $exibe["horarioInicio"] . "</td></tr>";
        echo "<tr><td><b>Descrição: </b>" . $exibe["descricao"] . "</td></tr>";
        echo "</table>";
        echo "</td>";
    }
    echo "</tr></table>";
}
include "estilo/rodape.php";
?>