<?php

include "espectador.php";

$endereco = $_POST["endereco"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$login = $_POST["login"];
$senha = $_POST["senha"];

$espectador = new espectador();
$espectador->setEndereco($endereco);
$espectador->setNome($nome);
$espectador->setEmail($email);
$espectador->setCpf($cpf);
$espectador->setRg($rg);
$espectador->setLogin($login);
$espectador->setSenha($senha);
$espectador->gravar();
?>
<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../estilo/rodape.php";
?>


