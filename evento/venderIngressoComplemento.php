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
        if ($exibe["lugaresnumerados"] == 1)
            $cadeiranumerada = $_POST['lugar'];

        echo "<form action='vendaConcluida.php?id=" . $id_evento . "' method='post'>";
        echo "<h2>" . $exibe['nome'] . "</h2>";
        ?>

        <br>
        Tipo de Pagamento:<br>
        <input type="radio" name="pagamento"
        <?php
        if (isset($pagamento) && $opcao == "dinheiro")
            echo "checked";
        ?>
               value="dinheiro">Dinheiro<br>
        <input type="radio" name="pagamento"
        <?php
        if (isset($pagamento) && $opcao == "cartao")
            echo "checked";
        ?>
               value="cartao">Cartão de Debito/Credito

        <br><br>
        Meia:<br>
        <input type="radio" name="opcao"
        <?php
        if (isset($opcao) && $opcao == "sim")
            echo "checked";
        ?>
               value="sim">Sim<br>
        <input type="radio" name="opcao"
        <?php
        if (isset($opcao) && $opcao == "nao")
            echo "checked";
        ?>
               value="nao">Não

        <br>

        <?php
        if ($exibe["lugaresnumerados"] == 1) {
            echo "Cadeira: " . $cadeiranumerada;
            $_SESSION["cadeira"] = $cadeiranumerada;
        }
        ?>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-default">OK</button>
        </div>
    </div>
</div>

<?php
include "../estilo/rodape.php";
?>