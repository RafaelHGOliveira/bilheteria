<?php
session_start();

if ($_SESSION["tipo"] == "espectador") {
    include "../espectador/espectador.php";
    $_SESSION["endereco"] = $_POST["endereco"];
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["cpf"] = $_POST["cpf"];
    $_SESSION["rg"] = $_POST["rg"];

    $espectador = new espectador();
    $espectador->setEndereco($_SESSION["endereco"]);
    $espectador->setNome($_SESSION["nome"]);
    $espectador->setEmail($_SESSION["email"]);
    $espectador->setCpf($_SESSION["cpf"]);
    $espectador->setRg($_SESSION["rg"]);
    $espectador->alterar();
} else
if ($_SESSION["tipo"] == "agenciador") {
    include "../agenciador/agenciador.php";
    $_SESSION["endereco"] = $_POST["endereco"];
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["cpf"] = $_POST["cpf"];
    $_SESSION["rg"] = $_POST["rg"];
    $_SESSION["telefone"] = $_POST["telefone"];

    $agenciador = new agenciador();
    $agenciador->setTelefone($_SESSION["telefone"]);
    $agenciador->setEndereco($_SESSION["endereco"]);
    $agenciador->setNome($_SESSION["nome"]);
    $agenciador->setEmail($_SESSION["email"]);
    $agenciador->setCpf($_SESSION["cpf"]);
    $agenciador->setRg($_SESSION["rg"]);
    $agenciador->alterar();
} else
if ($_SESSION["tipo"] == "administrador") {
    include "../administrador/administrador.php";
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["email"] = $_POST["email"];

    $administrador = new administrador();
    $administrador->setNome($_SESSION["nome"]);
    $administrador->setEmail($_SESSION["email"]);
    $administrador->alterar();
} else
if ($_SESSION["tipo"] == "bilheteria") {
    include "../clienteBilheteria/clientebilheteria.php";
    $_SESSION["endereco"] = $_POST["endereco"];
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["email"] = $_POST["email"];

    $clientebilheteria = new clientebilheteria();
    $clientebilheteria->setEndereco($_SESSION["endereco"]);
    $clientebilheteria->setNome($_SESSION["nome"]);
    $clientebilheteria->setEmail($_SESSION["email"]);
    $clientebilheteria->alterar();
}
?>
<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div>
    <h1>Dados alterados</h1>
</div>

<?php
include "../estilo/rodape.php";
?>


