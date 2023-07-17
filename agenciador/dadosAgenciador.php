<?php

include "agenciador.php";

$endereco = $_POST["endereco"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$login = $_POST["login"];
$senha = $_POST["senha"];

$agenciador = new agenciador();
$agenciador->setEndereco($endereco);
$agenciador->setNome($nome);
$agenciador->setEmail($email);
$agenciador->setCpf($cpf);
$agenciador->setRg($rg);
$agenciador->setTelefone($telefone);
$agenciador->setLogin($login);
$agenciador->setSenha($senha);
$agenciador->gravar();
?>
<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../estilo/rodape.php";
?>