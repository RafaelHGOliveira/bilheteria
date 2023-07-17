<?php

include "../funcoes/conecta.php";

class espectador {

    private $nome;
    private $email;
    private $cpf;
    private $endereco;
    private $rg;
    private $login;
    private $senha;

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

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getRg() {
        return $this->rg;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function gravar() {
        $sql = "INSERT INTO espectador VALUES ";
        $sql .= "('','" . $this->getNome() . "','" . $this->getEndereco() . "','" . $this->getEmail() . "','" . $this->getCpf()
                . "','" . $this->getRg() . "','" . $this->getLogin() . "','" . $this->getSenha() . "')";
        $this->objeto->Executar($sql);
    }

    function alterar() {

        $sql = "UPDATE espectador SET ";
        $sql .= "nome = '" . $this->getNome() . "',endereco ='" . $this->getEndereco() . "',email ='" . $this->getEmail()
                . "',cpf = '" . $this->getCpf() . "',rg = '" . $this->getRg() . "' where id_espectador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

    function alterarsenha() {
        $sql = "UPDATE espectador SET ";
        $sql .= "senha = '" . $this->getSenha()
                . "' where id_espectador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

}
