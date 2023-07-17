<?php

session_start();

include "../ingresso/ingresso.php";
include "venda.php";

$id_evento = $_GET["id"];
$opcao = $_POST["opcao"];
$pagamento = $_POST["pagamento"];
if (isset($_SESSION["cadeira"]))
    $lugarvendido = $_SESSION["cadeira"];

$sql = "update evento set vendidos =vendidos+1 where id_evento=" . $id_evento;

$objeto = new conecta();
$objeto->conectar();
$objeto->Executar($sql);

$venda = new venda();
$ingresso = new ingresso();

$venda->setTipocomprador("bilheteria");
$venda->setLogincomprador($_SESSION["login"]);
$venda->setDatavenda(date('Y-m-d'));
if ($opcao == "sim") {
    $venda->setMeia(1);
} else
    $venda->setMeia(0);
$venda->setId_evento($id_evento);
$venda->setTipopagamento($pagamento);
if (isset($_SESSION["cadeira"]))
    $venda->setCadeira($lugarvendido);
$venda->gravar();

$sql = "select max(venda.id_venda) as id_venda from venda";
$conectado = $objeto->RetornaConexao();
$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);

$ingresso->gerarIngresso($exibe["id_venda"]);

$sql = "select * from ingresso inner join venda on ingresso.id_venda = venda.id_venda 
                inner join evento on venda.id_evento = evento.id_evento 
                order by venda.id_venda desc limit 1";

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


