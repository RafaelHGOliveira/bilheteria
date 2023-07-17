<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada" style="height: 800px">
    <h2>Evento</h2>
    <h3> Selecione a poltrona disponivel </h3>
    <div>
        <?php
        include "../funcoes/conecta.php";
        $id_evento = $_GET["id"];
        $objeto = new conecta();
        $objeto->conectar();
        $sql = "select * from evento where id_evento =" . $id_evento;
        $conectado = $objeto->RetornaConexao();
        $rs = mysqli_query($conectado, $sql);
        $exibe = mysqli_fetch_array($rs);
        $sql2 = "select cadeira from venda";
        $rs2 = mysqli_query($conectado, $sql2);
        $total = mysqli_num_rows($rs2);
        for ($i = 0; $i < $total; $i++) {
            $exibe2 = mysqli_fetch_array($rs2);
            $vendidos[$i] = $exibe2["cadeira"];
        }
        if ($exibe["lugaresnumerados"] == 1) {
            echo "<table cellspacing='2' cellpadding='2'>";
            for ($lugar = 1; $lugar <= $exibe["capacidade"]; $lugar++) {
                if ($_SESSION["tipo"] == "bilheteria")
                    echo "<form action='venderIngressoComplemento.php?id="
                    . $id_evento . "' method='post'>";
                else
                    echo "<form action='meia.php?id="
                    . $id_evento . "' method='post'>";
                if ($lugar % 10 == 1) {
                    echo "</tr><tr>";
                }
                $cadeira = "success";

                for ($i = 0; $i < $total; $i++) {
                    if ($lugar == $vendidos[$i])
                        $cadeira = "danger";
                }

                if ($cadeira == "danger") {
                    echo "<td align='center'><button type='submit' class='btn-$cadeira btn-xs' disabled='disabled' name='lugar' value='$lugar'>$lugar</button></a></td>";
                } else {
                    echo "<td align='center'><button type='submit' class='btn-$cadeira btn-xs' name='lugar' value='$lugar'>$lugar</button></a></td>";
                }
                echo "</form>";
            }
            echo "</table>";
        } else
            header("location:/bilheteria/evento/venderIngressoComplemento.php?id=" . $id_evento);
        ?>


        </form>
    </div>
</div>
<?php
include "../estilo/rodape.php";
?>

