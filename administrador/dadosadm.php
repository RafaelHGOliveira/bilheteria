<?php

include "administrador.php";

$nome = $_POST["nome"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$email = $_POST["email"];

$administrador = new administrador();
$administrador->setNome($nome);
$administrador->setEmail($email);
$administrador->setSenha($senha);
$administrador->SetLogin($login);
$administrador->gravar();
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "../estilo/rodape.php";
