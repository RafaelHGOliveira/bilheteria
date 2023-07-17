<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";


$senhaatual = $_POST["senhaatual"];
$senhanova = $_POST["senhanova"];

if ($_SESSION["tipo"] == "espectador") {

    if ($senhaatual == $_SESSION["senha"]) {
        include "../espectador/espectador.php";
        $_SESSION["senha"] = $senhanova;
        $espectador = new espectador();
        $espectador->setSenha($_SESSION["senha"]);
        $espectador->alterarsenha();
    } else {
        echo "<div class='divEstilizada' style='height: 450px'>";
        echo "Senha incorreta!!!";
        echo "<br>";
        echo "<a href='alterarsenha.php' align='right'>Clique aqui para tentar novamente/</a>";
        echo "</div>";
        echo "<div><h1>Dados alterados</h1></div>";
    }
} else
if ($_SESSION["tipo"] == "agenciador") {

    if ($senhaatual == $_SESSION["senha"]) {
        include "../agenciador/agenciador.php";
        $_SESSION["senha"] = $senhanova;
        $agenciador = new agenciador();
        $agenciador->setSenha($_SESSION["senha"]);
        $agenciador->alterarsenha();
        echo "<div><h1>Dados alterados</h1></div>";
    } else {
        echo "<div class='divEstilizada' style='height: 450px'>";
        echo "Senha incorreta!!!";
        echo "<br>";
        echo "<a href='alterarsenha.php' align='right'>Clique aqui para tentar novamente/</a>";
        echo "</div>";
    }
} else
if ($_SESSION["tipo"] == "administrador") {

    if ($senhaatual == $_SESSION["senha"]) {
        include "../administrador/administrador.php";
        $_SESSION["senha"] = $senhanova;
        $administrador = new administrador();
        $administrador->setSenha($_SESSION["senha"]);
        $administrador->alterarsenha();
        echo "<div><h1>Dados alterados</h1></div>";
    } else {
        echo "<div class='divEstilizada' style='height: 450px'>";
        echo "Senha incorreta!!!";
        echo "<br>";
        echo "<a href='alterarsenha.php' align='right'>Clique aqui para tentar novamente/</a>";
        echo "</div>";
    }
} else
if ($_SESSION["tipo"] == "bilheteria") {

    if ($senhaatual == $_SESSION["senha"]) {
        include "../clienteBilheteria/clientebilheteria.php";
        $_SESSION["senha"] = $senhanova;
        $clienteBilheteria = new clienteBilheteria();
        $clienteBilheteria->setSenha($_SESSION["senha"]);
        $clienteBilheteria->alterarsenha();
        echo "<div><h1>Dados alterados</h1></div>";
    } else {
        echo "<div class='divEstilizada' style='height: 450px'>";
        echo "Senha incorreta!!!";
        echo "<br>";
        echo "<a href='alterarsenha.php' align='right'>Clique aqui para tentar novamente/</a>";
        echo "</div>";
    }
}
?>

<?php

include "../estilo/rodape.php";
?>

