

<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div style="margin-top: 50px;">

    <?php
    include "../funcoes/conecta.php";
    $objeto = new conecta();
    if ($objeto->conectar() == 0) {
        $conectado = $objeto->RetornaConexao();
        $sql = "SELECT * from evento where cancelado = '0'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        echo "<tr><th>Nome</th>";
        echo "<th>Tipo</th>";
        echo "<th>Data</th>";
        echo "<th>Vendidos</th>";
        echo "<th>Capacidade</th>";
        echo "<th>Duração</th>";
        echo "<th>Inicio</th>";
        echo "</tr>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>" . $exibe["nome"] . "</td>";
            echo "<td>" . $exibe["tipoEvento"] . "</td>";
            echo "<td>" . $exibe["dataevento"] . "</td>";
            echo "<td>" . $exibe["vendidos"] . "</td>";
            echo "<td>" . $exibe["capacidade"] . "</td>";
            echo "<td>" . $exibe["duracao"] . "</td>";
            echo "<td>" . $exibe["horarioInicio"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

</div>

<?php
include "../estilo/rodape.php";
?>
