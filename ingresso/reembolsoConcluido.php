<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../funcoes/conecta.php";

$id_ingresso = $_POST["id_ingresso"];

$objeto = new conecta();
$objeto->conectar();
$conectado = $objeto->RetornaConexao();

$sql = "select * from ingresso "
        . "inner join venda on ingresso.id_venda = venda.id_venda "
        . "inner join evento on venda.id_evento = evento.id_evento "
        . "where ingresso.id_ingresso = " . $id_ingresso;

$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);

if ($exibe["cancelado"] == 1) {

    $sql = "select * from reembolso where id_ingresso = " . $id_ingresso;
    $rs = mysqli_query($conectado, $sql);
    $exibe = mysqli_fetch_array($rs);

    if ($exibe["id_ingresso"] != $id_ingresso) {

        $sql = "insert into reembolso values ('" . date("Y-m-d") . "',"
                . $id_ingresso . "," . $_SESSION["id"] . ")";
        $objeto->Executar($sql);

        echo "<h1>Ingresso pode ser reembolsado !!!</h1>";


        $sql = "select * from ingresso inner join venda on ingresso.id_venda = venda.id_venda 
                        inner join evento on venda.id_evento = evento.id_evento 
                        order by venda.id_venda desc limit 1";

        $rs = mysqli_query($conectado, $sql);
        $exibe = mysqli_fetch_array($rs);

        echo "<br><h1>Valor a ser reembolsado: " . $exibe["preco_ingresso"] . "</h2>";

        if ($exibe["meia"] == 0) {
            $_SESSION["total"] = $_SESSION["total"] - $exibe["preco_ingresso"];
            $_SESSION["reembolso"] += $exibe["preco_ingresso"];
        } else if ($exibe["meia"] == 1) {
            $_SESSION["total"] = $_SESSION["total"] - $exibe["preco_ingresso"] / 2;
            $_SESSION["reembolso"] += $exibe["preco_ingresso"] / 2;
        }
    } else {
        echo "<h1>Ingresso não pode ser reembolsado !!!</h1>";
        echo "<br><h3>Ingresso ja reembolsado</h3>";
    }
} else {
    echo "<h1>Ingresso não pode ser reembolsado !!!</h1>";
    echo "<br><h3>Evento não foi cancelado</h3>";
}
?>
<?php

include "../estilo/rodape.php";
?>


