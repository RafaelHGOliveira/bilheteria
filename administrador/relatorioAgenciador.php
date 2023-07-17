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
        $sql = "SELECT * from agenciador where ativo = '1'";
        $rs = mysqli_query($conectado, $sql);
        $total = mysqli_num_rows($rs);
        echo "<table class='table table-striped' style='width: 70%' align='center'>";
        echo "<tr><th>Nome</th>";
        echo "<th>Endereco</th>";
        echo "<th>E-mail</th>";
        echo "<th>CPF</th>";
        echo "<th>RG</th>";
        echo "<th>Telefone</th>";
        echo "<th>Login</th>";
        echo "</tr>";
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<tr><td>" . $exibe["nome"] . "</td>";
            echo "<td>" . $exibe["endereco"] . "</td>";
            echo "<td>" . $exibe["email"] . "</td>";
            echo "<td>" . $exibe["cpf"] . "</td>";
            echo "<td>" . $exibe["rg"] . "</td>";
            echo "<td>" . $exibe["telefone"] . "</td>";
            echo "<td>" . $exibe["login"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

</div>

<?php
include "../estilo/rodape.php";
?>
