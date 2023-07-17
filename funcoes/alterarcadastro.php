<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada">
    <form action="alterarcadastroconcluido.php" method="post">
        <div class="ajustadoEsquerda" style="margin-left: 65px">Nome:</div>
        <?php
        if ($_SESSION["tipo"] == "espectador") {
            $nome = $_SESSION["nome"];
            echo "<input type='text' name='nome' value=$nome>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>E-mail:</div>";
            $email = $_SESSION['email'];
            echo "<input type='text' name='email' value=$email>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>Endereco:</div>";
            $endereco = $_SESSION['endereco'];
            echo "<input type='text' name='endereco' value=$endereco>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>CPF:</div>";
            $cpf = $_SESSION['cpf'];
            echo "<input type='text' name='cpf' value=$cpf>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>RG:</div>";
            $rg = $_SESSION['rg'];
            echo "<input type='text' name='rg' value=$rg>";
            echo "<br><br>";
        } else
        if ($_SESSION["tipo"] == "agenciador") {
            $nome = $_SESSION["nome"];
            echo "<input type='text' name='nome' value=$nome>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>E-mail:</div>";
            $email = $_SESSION['email'];
            echo "<input type='text' name='email' value=$email>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>Endereco:</div>";
            $endereco = $_SESSION['endereco'];
            echo "<input type='text' name='endereco' value=$endereco>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>Telefone:</div>";
            $telefone = $_SESSION['telefone'];
            echo "<input type='text' name='telefone' value=$telefone>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>CPF:</div>";
            $cpf = $_SESSION['cpf'];
            echo "<input type='text' name='cpf' value=$cpf>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>RG:</div>";
            $rg = $_SESSION['rg'];
            echo "<input type='text' name='rg' value=$rg>";
            echo "<br><br>";
        } else
        if ($_SESSION["tipo"] == "administrador") {
            $nome = $_SESSION["nome"];
            echo "<input type='text' name='nome' value=$nome>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>E-mail:</div>";
            $email = $_SESSION['email'];
            echo "<input type='text' name='email' value=$email>";
            echo "<br><br>";
        } else
        if ($_SESSION["tipo"] == "bilheteria") {
            $nome = $_SESSION["nome"];
            echo "<input type='text' name='nome' value=$nome>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>Endereco:</div>";
            $endereco = $_SESSION['endereco'];
            echo "<input type='text' name='endereco' value=$endereco>";
            echo "<div class='ajustadoEsquerda' style='margin-left: 65px'>Email:</div>";
            $email = $_SESSION['email'];
            echo "<input type='text' name='email' value=$email>";
            echo "<br><br>";
        }
        echo "<button type='submit' class='btn btn-default'>OK</button>
                        <button type='reset' class='btn btn-default'>Limpar</button>";
        ?>
    </form>
</div>

<?php
include "../estilo/rodape.php";
?>