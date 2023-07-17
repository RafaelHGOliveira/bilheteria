
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
        $sql = "SELECT * from clientebilheteria where ativo = '0'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        echo "<tr><th>Nome</th>";
        echo "<th>Endereco</th>";
        echo "<th>E-mail</th>";
        echo "<th>Login</th>";
        echo "<th>Aprovar</th>";
        echo "<th>Recusar</th>";
        echo "</tr>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>" . $exibe["nome"] . "</td>";
            echo "<td>" . $exibe["endereco"] . "</td>";
            echo "<td>" . $exibe["email"] . "</td>";
            echo "<td>" . $exibe["login"] . "</td>";
            echo "<form action = '/bilheteria/funcoes/aceitarBilheteria.php' method = 'post'>";
            echo "<td><button type='submit' class='btn btn-default' name='aprovar' value='"
            . $exibe["id_clientebilheteria"] . "'>Aprovar</button></td>";
            echo "</form>";
            echo "<form action = '/bilheteria/funcoes/recusarBilheteria.php' method = 'post'>";
            echo "<td><button type='submit' class='btn btn-default' name='recusar' value='"
            . $exibe["id_clientebilheteria"] . "'>Recusar</button></td>";
            echo "</form></tr>";
        }
        echo "</table>";
    }
    ?>
</div>
<?php
include "../estilo/rodape.php";
?>
