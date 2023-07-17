<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div style="margin-top: 50px;">
    <form action="alterarcadastro.php" method="post">
        <div>Nome:
            <?php
            if ($_SESSION["tipo"] == "espectador") {
                echo $_SESSION["nome"];
                echo "<div>E-mail " . $_SESSION['email'] . "</div>";
                echo "<divEndereco: " . $_SESSION['endereco'] . "</div>";
                echo "<div>CPF: " . $_SESSION['cpf'] . "</div>";
                echo "<div>RG: " . $_SESSION['rg'] . "</div>";
                echo "<br><br>";
            } else
            if ($_SESSION["tipo"] == "agenciador") {
                echo $_SESSION["nome"];
                echo "<div>E-mail " . $_SESSION['email'] . "</div>";
                echo "<divEndereco: " . $_SESSION['endereco'] . "</div>";
                echo "<div>Telefone: " . $_SESSION['telefone'] . "</div>";
                echo "<div>CPF: " . $_SESSION['cpf'] . "</div>";
                echo "<div>RG: " . $_SESSION['rg'] . "</div>";
                echo "<br><br>";
            } else
            if ($_SESSION["tipo"] == "administrador") {
                echo $_SESSION["nome"];
                echo "<div>E-mail " . $_SESSION['email'] . "</div>";
                echo "<br><br>";
            } else
            if ($_SESSION["tipo"] == "bilheteria") {
                echo $_SESSION["nome"];
                echo "<div>E-mail " . $_SESSION['email'] . "</div>";
                echo "<div>Endereco: " . $_SESSION['endereco'] . "</div>";
                echo "<br><br>";
            }
            echo "<input type='submit' value='Alterar Perfil'/><br>";
            echo "<br></form><form action='alterarsenha.php' method='post'>";
            echo "<input type='submit' value='Alterar Senha'/>";
            echo "</form>";
            ?>
        </div>
        <?php
        include "../estilo/rodape.php";
        ?>


