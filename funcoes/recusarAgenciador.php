<?php

include "../agenciador/agenciador.php";
$codigo = $_POST["recusar"];
$agenciador = new agenciador();
$agenciador->Recusar($codigo);
header("location:/bilheteria/administrador/solicitacoesAgenciador.php");
