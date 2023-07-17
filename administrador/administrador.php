<?php

include "../funcoes/conecta.php";

class administrador {

    private $nome;
    private $login;
    private $email;
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

    function getLogin() {
        return $this->login;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function gravar() {
        $sql = "INSERT INTO administrador VALUES ";
        $sql .= "('','" . $this->getNome() . "','" . $this->getLogin() . "','" . $this->getEmail() . "','" . $this->getSenha() . "')";
        $this->objeto->Executar($sql);
    }

    function alterar() {

        $sql = "UPDATE administrador SET ";
        $sql .= "nome = '" . $this->getNome() . "',email ='" . $this->getEmail()
                . "' where id_administrador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

    function alterarsenha() {
        $sql = "UPDATE administrador SET ";
        $sql .= "senha = '" . $this->getSenha()
                . "' where id_administrador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

}
