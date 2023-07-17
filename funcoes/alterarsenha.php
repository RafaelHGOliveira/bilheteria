<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div style="margin-left: 70px">
    <form action="alterarsenhaconcluido.php" method="post">
        <div>Senha Atual:</div>
        <input type="password" name="senhaatual">
        <div>Senha Nova:</div>
        <input type="password" name="senhanova">
        <br><br>
        <button type="submit" class="btn btn-default">OK</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </form>
</div>

<?php
include "../estilo/rodape.php";
?>


