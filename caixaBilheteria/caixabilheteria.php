<?php

include "../funcoes/conecta.php";

class caixabilheteria {

    private $valorinicial;
    private $datainicio;
    private $horarioinicio;
    private $id_clientebilheteria;
    private $valorfinal;
    private $datatermino;
    private $horariotermino;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getValorfinal() {
        return $this->valorfinal;
    }

    function getDatatermino() {
        return $this->datatermino;
    }

    function getHorariotermino() {
        return $this->horariotermino;
    }

    function setValorfinal($valorfinal) {
        $this->valorfinal = $valorfinal;
    }

    function setDatatermino($datatermino) {
        $this->datatermino = $datatermino;
    }

    function setHorariotermino($horariotermino) {
        $this->horariotermino = $horariotermino;
    }

    function getValorinicial() {
        return $this->valorinicial;
    }

    function setValorinicial($valorinicial) {
        $this->valorinicial = $valorinicial;
    }

    function getDatainicio() {
        return $this->datainicio;
    }

    function getHorarioinicio() {
        return $this->horarioinicio;
    }

    function setDatainicio($datainicio) {
        $this->datainicio = $datainicio;
    }

    function setHorarioinicio($horarioinicio) {
        $this->horarioinicio = $horarioinicio;
    }

    function getId_clientebilheteria() {
        return $this->id_clientebilheteria;
    }

    function setId_clientebilheteria($id_clientebilheteria) {
        $this->id_clientebilheteria = $id_clientebilheteria;
    }

    function gravarAbrirCaixa() {
        $sql = "INSERT INTO caixabilheteria VALUES ";
        $sql .= "('" . $this->getValorinicial() . "','','" . $this->getDatainicio()
                . "','','" . $this->getHorarioinicio() . "','','" . $this->getId_clientebilheteria()
                . "','')";
        $this->objeto->Executar($sql);
    }

    function gravarFecharCaixa() {

        $sql = "UPDATE caixabilheteria set ";
        $sql .= "valorfinal= '" . $this->getValorfinal() . "', datatermino= '" . $this->getDatatermino()
                . "', horariotermino='" . $this->getHorariotermino() . "'"
                . " where id_caixabilheteria= " . $_SESSION["id_caixa"];
        $this->objeto->Executar($sql);
    }

}
