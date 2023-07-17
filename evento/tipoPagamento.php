<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada" style="height: 800px">
    <div>
        <?php
        include "../funcoes/conecta.php";

        $objeto = new conecta();
        $objeto->conectar();
        $id_evento = $_GET["id"];
        $sql = "select * from evento where id_evento =" . $id_evento;
        $conectado = $objeto->RetornaConexao();
        $rs = mysqli_query($conectado, $sql);
        $exibe = mysqli_fetch_array($rs);
        if ($exibe["lugaresnumerados"] == 1) {
            if (isset($_SESSION["lugar"]))
                $cadeiranumerada = $_SESSION["lugar"];
            if (isset($_POST["lugar"]))
                $cadeiranumerada = $_POST['lugar'];
        }
        echo "<h2>" . $exibe['nome'] . "</h2>";
        ?>

        Tipo de Pagamento:<br>
        <?php
        if (isset($_POST["opcao"])) {
            $_SESSION["meia"] = $_POST["opcao"];
        }

        if ($exibe["lugaresnumerados"] == 1) {

            echo "<a href='compraConcluida.php?id_evento=" . $id_evento
            . "&pagamento=boleto&cadeira=" . $cadeiranumerada . "'>"
            . "<img src='/bilheteria/imagens/boleto.png'></a>";
            echo "<a href='/bilheteria/venda/venderIngressosComCartaoCredito.php?id_evento="
            . $id_evento . "&pagamento=cartao&cadeira=" . $cadeiranumerada . "'>"
            . "<img src='/bilheteria/imagens/cartoes.png'></a>";

            echo "<br>Cadeira:  " . $cadeiranumerada;
        } else {
            echo "<a href='compraConcluida.php?id_evento=" . $id_evento . "&pagamento=boleto'>"
            . "<img src='/bilheteria/imagens/boleto.png'></a>";
            echo "<a href='/bilheteria/venda/venderIngressosComCartaoCredito.php?id_evento="
            . $id_evento . "&pagamento=cartao'>"
            . "<img src='/bilheteria/imagens/cartoes.png'></a>";
        }
        ?>
    </div>
</div>
<?php
include "../estilo/rodape.php";
?>