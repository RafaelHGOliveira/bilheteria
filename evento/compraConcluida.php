<?php
session_start();

include "../ingresso/ingresso.php";
include "venda.php";

$id_evento = $_GET["id_evento"];
$opcao = $_SESSION["meia"];
$pagamento = $_GET["pagamento"];

if (isset($_GET["cadeira"]))
    $lugarvendido = $_GET["cadeira"];
else
if (isset($_SESSION["cadeira"]))
    $lugarvendido = $_SESSION["cadeira"];

$sql = "update evento set vendidos =vendidos+1 where id_evento=" . $id_evento;

$objeto = new conecta();
$objeto->conectar();
$objeto->Executar($sql);

$venda = new venda();
$ingresso = new ingresso();

$venda->setTipocomprador("espectador");
$venda->setLogincomprador($_SESSION["login"]);
$venda->setDatavenda(date('Y-m-d'));
if ($opcao == "sim") {
    $venda->setMeia(1);
} else
    $venda->setMeia(0);
$venda->setId_evento($id_evento);
$venda->setTipopagamento($pagamento);
if (isset($lugarvendido))
    $venda->setCadeira($lugarvendido);
else
    $lugarvendido = 0;
$venda->gravar();
$sql = "select max(venda.id_venda) as id_venda from venda";
$conectado = $objeto->RetornaConexao();
$rs = mysqli_query($conectado, $sql);
$exibe = mysqli_fetch_array($rs);
$ingresso->gerarIngresso($exibe["id_venda"]);

if ($pagamento == "cartao") {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="/bilheteria/estilo/pagina.css"/>
            <title></title>
        </head>
        <body>
            <div style="width: 100%" align="center">
                <div class="cabecalho">
                    <a href="/bilheteria/index.php"><img src="/bilheteria/imagens/LOGO_120x75.png" style="width: 250px"/></a><br>
                    <?php
                    if (!isset($_SESSION['login'])) {
                        echo "<a href='/bilheteria/funcoes/loginTela.php' align='right'>Login/</a>";
                        echo "<a href='/bilheteria/funcoes/opcao.php' align='right'>Cadastre-se</a>";
                    } else {
                        echo "<a href='/bilheteria/funcoes/perfil.php' align='right'>Bem Vindo, " . $_SESSION['nome'] . "/</a>";
                        echo "<a href='/bilheteria/funcoes/logout.php' align='right'>logout</a>";
                    }
                    ?>
                    <ul>
                        <li><a href="/bilheteria/index.php">Home</a></li>
                        <li><a href="#">Shows</a></li>
                        <li><a href="#">Festas e Festivais</a></li>
                        <li><a href="#">Teatros</a></li>
                        <li><a href="#">Exposições</a></li>
                        <li><a href="#">Esportivos</a></li>
                    </ul>
                </div>

                <div class="esquerda">
                    <ul>
                        <?php
                    
                        if (isset($_SESSION['login'])) {
                            if ($_SESSION["tipo"] == "agenciador") {
                                echo "<li><a href='/bilheteria/evento/cadastroEvento.php'>Cadastrar Eventos</a></li>";
                                echo "<li><a href='/bilheteria/clienteBilheteria/cadastroBilheteria.php'>"
                                . "Cadastrar Bilheteria</a></li>";
                            } else
                            if ($_SESSION["tipo"] == "administrador") {
                                echo "<li><a href = '/bilheteria/administrador/notificacoes.php'>Relatorios e Notificações</a></li>";
                            } else
                            if ($_SESSION["tipo"] == "bilheteria") {
                                if (isset($_SESSION['venda_liberada'])) {

                                    if ($_SESSION["venda_liberada"] == 1) {
                                        echo "<li><a href='/bilheteria/caixabilheteria/fecharCaixa.php'>Fechar Caixa</a></li>";
                                        echo "<li><a href='/bilheteria/ingresso/reembolso.php'>Reembolso</a></li>";
                                    } else if ($_SESSION["venda_liberada"] == 0) {
                                        echo "<li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                                    }
                                } else
                                    echo "<li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                            }
                        }

                        $sql = "select id_ingresso from ingresso where id_venda= '" . $exibe["id_venda"] . "'";
                        $conectado = $objeto->RetornaConexao();
                        $rs = mysqli_query($conectado, $sql);
                        $exibe = mysqli_fetch_array($rs);
                        $ingresso = $exibe["id_ingresso"];

                        ?>
                    </ul>
                </div>
                <div class="direita">
                    <h1> Mais Visitados </h1>
                </div>
                <div>
                    <h1 align:center>Compra com Cartão de Crédito Concluída</h1>
                    <br><br> <br><br>
                    <?php
                    echo "<h1><a href='/bilheteria/voucher/gerarVoucher.php?id_ingresso=" . $ingresso . "'>Imprima seu Voucher></a></h1>";
                    ?>
                </div>
                <?php
                include "../estilo/rodape.php";
                ?>


                <?php
            }
