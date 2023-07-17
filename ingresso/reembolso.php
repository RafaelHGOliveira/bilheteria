<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../funcoes/conecta.php";

echo "<form action='reembolsoConcluido.php' method='post'>";

echo "Numero do ingresso:";

echo "<input type='number' name='id_ingresso' placeholder=''>";

echo "<button type='submit' class='btn btn-default'>Enviar</button>";
echo "</form>";
?>

<?php

include "../estilo/rodape.php";
?>


