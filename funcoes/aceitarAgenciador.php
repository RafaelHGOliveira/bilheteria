<?php

include "../agenciador/agenciador.php";
$codigo = $_POST["aprovar"];
$agenciador = new agenciador();
$agenciador->Aprovar($codigo);
header("location:/bilheteria/administrador/solicitacoesAgenciador.php");
