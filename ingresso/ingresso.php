<?php

class ingresso {

    private $id_venda;
    private $id_ingresso;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getId_venda() {
        return $this->id_venda;
    }

    function getId_ingresso() {
        return $this->id_ingresso;
    }

    function setId_venda($id_venda) {
        $this->id_venda = $id_venda;
    }

    function setId_ingresso($id_ingresso) {
        $this->id_ingresso = $id_ingresso;
    }

    function gerarIngresso($id_venda) {

        $sql = "INSERT INTO ingresso (`id_ingresso`, `id_venda`) VALUES (NULL, '" . $id_venda . "')";
        $this->objeto->Executar($sql);
    }

}
