<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<br>
<?php
echo "<form action='tipoPagamento.php?id=" . $_GET["id"] . "' method='post'>";
if (isset($_POST["lugar"]))
    $_SESSION["lugar"] = $_POST["lugar"];
?>
Meia entrada?<br>
<input type="radio" name="opcao"
<?php
if (isset($opcao) && $opcao == "sim")
    echo "checked";
$opcao = 'sim';
?>
       value="sim">Sim<br>
<input type="radio" name="opcao"
<?php
if (isset($opcao) && $opcao == "nao")
    echo "checked";
$opcao = 'nao';
?>
       value="nao">Não

<br>
<button type="submit" class="btn btn-default">OK</button>

</form>
<?php
include "../estilo/rodape.php";
?>
