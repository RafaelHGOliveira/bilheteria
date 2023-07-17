<?php

include "../funcoes/conecta.php";

class clientebilheteria {

    private $nome;
    private $email;
    private $endereco;
    private $id;
    private $login;
    private $senha;
    private $id_agenciador;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getId_agenciador() {
        return $this->id_agenciador;
    }

    function setId_agenciador($id_agenciador) {
        $this->id_agenciador = $id_agenciador;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function gravar() {
        $sql = "INSERT INTO clientebilheteria VALUES ";
        $sql .= "('" . $this->getLogin() . "','" . $this->getSenha() . "','" . $this->getEmail() .
                "','" . $this->getNome() . "','" . $this->getEndereco() . "','" .
                $this->getId_agenciador() . "','','')";
        $this->objeto->Executar($sql);
    }

    function alterar() {

        $sql = "UPDATE clientebilheteria SET ";
        $sql .= "nome = '" . $this->getNome() . "',email ='" . $this->getEmail()
                . "' where id_clientebilheteria = '" . $_SESSION["id"] . "'";
        $this->objeto->Executar($sql);
    }

    function alterarsenha() {
        $sql = "UPDATE clientebilheteria SET ";
        $sql .= "senha = '" . $this->getSenha()
                . "' where id_clientebilheteria = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

    function Aprovar($codigo) {
        $sql = "UPDATE clientebilheteria SET ";
        $sql .= "ativo = '1' where id_clientebilheteria = '$codigo'";

        $this->objeto->Executar($sql);
    }

    function Recusar($codigo) {
        $sql = "DELETE from clientebilheteria ";
        $sql .= "where id_clientebilheteria = '$codigo'";
        $this->objeto->Executar($sql);
    }

}
