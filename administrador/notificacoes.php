
<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";

include "../funcoes/conecta.php";
$objeto = new conecta();
if ($objeto->conectar() == 0) {
    $conectado = $objeto->RetornaConexao();
    $sql = "SELECT * from agenciador where ativo = '0'";
    $rs = mysqli_query($conectado, $sql);
    $pendentes = mysqli_num_rows($rs);
    echo "<h3> <a href='solicitacoesAgenciador.php'>Solicitações de Agenciadores Pendentes "
    . "</a><span class='badge'>$pendentes</span></h3>";

    $sql = "SELECT * from clientebilheteria where ativo = '0'";
    $rs = mysqli_query($conectado, $sql);
    $pendentes = mysqli_num_rows($rs);
    echo "<h3> <a href='solicitacoesBilheteria.php'>Solicitações de Bilheterias Pendentes "
    . "</a><span class='badge'>$pendentes</span></h3>";

    $sql1 = "SELECT * from agenciador where ativo = '1'";
    $rs1 = mysqli_query($conectado, $sql1);
    $ativos = mysqli_num_rows($rs1);
    echo "<h3><a href='relatorioAgenciador.php'>Relatório de Agenciadores </a><span class='badge'>$ativos</span></h3>";
    $sql2 = "SELECT * from evento where cancelado ='0'";
    $rs2 = mysqli_query($conectado, $sql2);
    $eventos = mysqli_num_rows($rs2);
    echo "<h3><a href='relatorioEvento.php'>Relatório de Eventos </a><span class='badge'>$eventos</span></h3>";
    $sql3 = "SELECT * from evento where cancelado ='1'";
    $rs3 = mysqli_query($conectado, $sql3);
    $eventos = mysqli_num_rows($rs3);
    echo "<h3><a href='relatorioEventosCancelados.php'>Relatório de Eventos Cancelados </a><span class='badge'>$eventos</span></h3>";
    echo "<h3><a href='relatorioVendasMensais.php'>Relatório de Vendas</a></h3>";
    echo "<h3><a href='relatorioBuscaAgenciador.php'>Relatório de Vendas por Agenciador </a></h3>";
}
include "../estilo/rodape.php";
?>
