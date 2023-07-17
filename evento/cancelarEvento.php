<?php
session_start();

include "evento.php";

$id_evento = $_GET["id"];

$sql = "update evento set cancelado=1 where id_evento=" . $id_evento;

$objeto = new conecta();
$objeto->conectar();
$objeto->Executar($sql);
?>
<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div>
    <h1>Evento Cancelado!</h1>
</div>
<?php
include "../estilo/rodape.php";
?>


