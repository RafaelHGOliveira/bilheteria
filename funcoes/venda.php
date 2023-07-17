<?php

class venda {

    private $preco;
    private $tipoingresso;
    private $meia;
    private $id_evento;
    private $id_espectador;
    private $id_clientebilheteria;
    private $tipopagamento;
    private $id_venda;

    function __construct() {
        
    }

    function getPreco() {
        return $this->preco;
    }

    function getTipoingresso() {
        return $this->tipoingresso;
    }

    function getMeia() {
        return $this->meia;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getId_espectador() {
        return $this->id_espectador;
    }

    function getId_clientebilheteria() {
        return $this->id_clientebilheteria;
    }

    function getTipopagamento() {
        return $this->tipopagamento;
    }

    function getId_venda() {
        return $this->id_venda;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setTipoingresso($tipoingresso) {
        $this->tipoingresso = $tipoingresso;
    }

    function setMeia($meia) {
        $this->meia = $meia;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setId_espectador($id_espectador) {
        $this->id_espectador = $id_espectador;
    }

    function setId_clientebilheteria($id_clientebilheteria) {
        $this->id_clientebilheteria = $id_clientebilheteria;
    }

    function setTipopagamento($tipopagamento) {
        $this->tipopagamento = $tipopagamento;
    }

    function setId_venda($id_venda) {
        $this->id_venda = $id_venda;
    }

}
