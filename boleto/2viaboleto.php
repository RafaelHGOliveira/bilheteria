<?php

include "../funcoes/conecta.php";

session_start();

$objeto = new conecta();
$objeto->conectar();
$conectado = $objeto->RetornaConexao();

if (isset($_POST["id_boleto"]))
    $id_boleto = $_POST["id_boleto"];

$sql = "SELECT * from boleto inner join venda on boleto.id_venda = venda.id_venda "
        . "inner join espectador on logincomprador = '" . $_SESSION["login"]
        . "' inner join evento on evento.id_evento = venda.id_evento where tipocomprador = 'espectador' "
        . "and id_boleto = " . $id_boleto;
$rs = mysqli_query($conectado, $sql);
$total = mysqli_num_rows($rs);
$exibe = mysqli_fetch_array($rs);

if ($exibe["meia"] == 1)
    $_SESSION["valor"] = $exibe["preco_ingresso"] / 2;
else
    $_SESSION["valor"] = $exibe["preco_ingresso"];
$_SESSION["venc"] = $exibe["datavenc"];
header("location:/bilheteria/boleto/boleto_bb.php");
