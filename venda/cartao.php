<?php

include "../funcoes/conecta.php";

class Cartao {

    private $nome_titular;
    private $data_nascimento;
    private $cpf;
    private $numero_cartao;
    private $data_vencimento;
    private $id_espectador;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function getData_vencimento() {
        return $this->data_vencimento;
    }

    function setData_vencimento($data_vencimento) {
        $this->data_vencimento = $data_vencimento;
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getNome_titular() {
        return $this->nome_titular;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getNumero_cartao() {
        return $this->numero_cartao;
    }

    function setNome_titular($nome_titular) {
        $this->nome_titular = $nome_titular;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNumero_cartao($numero_cartao) {
        $this->numero_cartao = $numero_cartao;
    }

    function getId_espectador() {
        return $this->id_espectador;
    }

    function setId_espectador($id_espectador) {
        $this->id_espectador = $id_espectador;
    }

    function gravar() {

        $sql = "INSERT INTO cartao VALUES ";
        $sql .= "('" . $this->getNome_titular() . "','" . $this->getData_nascimento() . "','" . $this->getCpf() . "','"
                . $this->getNumero_cartao() . "','" . $this->getData_vencimento()
                . "','" . $this->getId_espectador() . "','')";
        $this->objeto->Executar($sql);
    }

}
