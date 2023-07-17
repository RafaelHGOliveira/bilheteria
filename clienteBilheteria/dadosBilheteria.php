<?php

include "clienteBilheteria.php";

$endereco = $_POST["endereco"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$login = $_POST["login"];
$senha = $_POST["senha"];

$clienteBilheteria = new clientebilheteria();
$clienteBilheteria->setEndereco($endereco);
$clienteBilheteria->setNome($nome);
$clienteBilheteria->setEmail($email);
$clienteBilheteria->setLogin($login);
$clienteBilheteria->setId_agenciador($_SESSION["id"]);
$clienteBilheteria->setSenha($senha);
$clienteBilheteria->gravar();
?>
<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../estilo/rodape.php";
?>
