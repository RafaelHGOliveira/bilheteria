<?php

include "../funcoes/conecta.php";

class voucher {

    private $id_ingresso;
    private $id_voucher;
 

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

  
    function getId_ingresso() {
        return $this->id_ingresso;
    }

    function getId_voucher() {
        return $this->id_voucher;
    }

    function setId_ingresso($id_ingresso) {
        $this->id_ingresso = $id_ingresso;
    }

    function setId_voucher($id_voucher) {
        $this->id_voucher = $id_voucher;
    }

    
    function gravar() {
        $sql = "INSERT INTO voucher VALUES ";
        $sql .= "('" . $this->getId_ingresso() . "','" . $this->getId_voucher(). "')";
        $this->objeto->Executar($sql);
    }

}
