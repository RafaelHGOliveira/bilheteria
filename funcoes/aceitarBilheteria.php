<?php

include "../clienteBilheteria/clienteBilheteria.php";
$codigo = $_POST["aprovar"];
$clienteBilheteria = new clienteBilheteria();
$clienteBilheteria->Aprovar($codigo);
header("location:/bilheteria/administrador/solicitacoesBilheteria.php");
