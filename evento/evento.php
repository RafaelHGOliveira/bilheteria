<?php

include "../funcoes/conecta.php";

class evento {

    private $nome;
    private $dataevento;
    private $horarioinicio;
    private $duracao;
    private $precoingresso;
    private $tipoevento;
    private $endereco;
    private $idademinima;
    private $descricao;
    private $lugaresnumerados;
    private $capacidade;
    private $id_agenciador;
    private $cancelado;
    private $diretorio;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getNome() {
        return $this->nome;
    }

    function getDataevento() {
        return $this->dataevento;
    }

    function getHorarioinicio() {
        return $this->horarioinicio;
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getPrecoingresso() {
        return $this->precoingresso;
    }

    function getTipoevento() {
        return $this->tipoevento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getIdademinima() {
        return $this->idademinima;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getLugaresnumerados() {
        return $this->lugaresnumerados;
    }

    function getCapacidade() {
        return $this->capacidade;
    }

    function getId_agenciador() {
        return $this->id_agenciador;
    }

    function getCancelado() {
        return $this->cancelado;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataevento($dataevento) {
        $this->dataevento = $dataevento;
    }

    function setHorarioinicio($horarioinicio) {
        $this->horarioinicio = $horarioinicio;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    function setPrecoingresso($precoingresso) {
        $this->precoingresso = $precoingresso;
    }

    function setTipoevento($tipoevento) {
        $this->tipoevento = $tipoevento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setIdademinima($idademinima) {
        $this->idademinima = $idademinima;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setLugaresnumerados($lugaresnumerados) {
        $this->lugaresnumerados = $lugaresnumerados;
    }

    function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    function setId_agenciador($id_agenciador) {
        $this->id_agenciador = $id_agenciador;
    }

    function setCancelado($cancelado) {
        $this->cancelado = $cancelado;
    }

    function getDiretorio() {
        return $this->diretorio;
    }

    function setDiretorio($diretorio) {
        $this->diretorio = $diretorio;
    }

    function gravar() {
        $sql = "INSERT INTO evento VALUES ";
        $sql .= "('" . $this->getNome() . "','" . $this->getDataevento() . "','" . $this->getHorarioinicio() . "','"
                . $this->getDuracao() . "','" . $this->getPrecoingresso() . "','" . $this->getTipoevento()
                . "','" . $this->getEndereco() . "','" . $this->getIdademinima() . "','" . $this->getDescricao()
                . "','" . $this->getLugaresnumerados() . "','" . $this->getCapacidade() . "','" . $this->getId_agenciador()
                . "','','','','" . $this->getDiretorio() . "')";

        $this->objeto->Executar($sql);
    }

}
