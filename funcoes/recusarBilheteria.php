<?php

include "../clienteBilheteria/clienteBilheteria.php";
$codigo = $_POST["recusar"];
$clienteBilheteria = new clienteBilheteria();
$clienteBilheteria->Recusar($codigo);
header("location:/bilheteria/administrador/solicitacoesBilheteria.php");
