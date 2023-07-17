<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

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
        ?>
    </ul>
</div>


<div class="divEstilizada" style="height: 150px; margin-top: 50px;">

    <h1>Voucher</h1>
    <?php
    include "voucher.php";

    $ingresso = $_GET["id_ingresso"];
    
    echo $voucherid = crc32($ingresso);;

    $voucher = new voucher();
    $voucher->setId_voucher($voucherid);
    $voucher->setId_ingresso($ingresso);
    $voucher->gravar();
    ?>

</div>

<?php
include "../estilo/rodape.php";
?>


