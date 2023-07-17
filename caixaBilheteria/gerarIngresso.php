<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../funcoes/conecta.php";

$voucher = $_POST["voucher"];

 $sql = "select * from voucher where id_voucher= '".$voucher."'";
$conectado = $objeto->RetornaConexao();
$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);
if($exibe["id_ingresso"] == null ){
?>

<div class="divEstilizada" style="height: 300px">
    <h1>Voucher não encontrado</h1>
  
</div>
<?php

include "../estilo/rodape.php";
}else{
    $sql = "select * from ingresso where id_ingresso= '".$exibe["i_ingresso"]."'";

$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);

if ($exibe["meia"] == 0)
    $_SESSION["total"] += $exibe["preco_ingresso"];
else if ($exibe["meia"] == 1)
    $_SESSION["total"] += $exibe["preco_ingresso"] / 2;

$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);

echo "<table border='30'>";

echo "<tr align='center'><td colspan='100'>" . $exibe["nome"] . "</td></tr>";

echo "<tr><td>" . $exibe["horarioInicio"] . "</td>";

echo "<td>" . $exibe["endereco"];

echo "</td><td>Lugar: " . $exibe["cadeira"];

echo "</td><td>N°: " . $exibe["id_ingresso"];

echo "</td></table>";

echo "<br><br>";

echo "<a href='/bilheteria/index.php'> < Voltar</a>";
}
?>

