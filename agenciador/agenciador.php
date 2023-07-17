<?php

include "../espectador/espectador.php";

class agenciador extends espectador {

    private $telefone;

    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function gravar() {

        $sql = "";
        $sql = "INSERT INTO agenciador VALUES ";
        $sql .= "('','" . $this->getNome() . "','" . $this->getEndereco() . "','" . $this->getEmail() . "','" . $this->getCpf()
                . "','" . $this->getRg() . "','" . $this->getTelefone() . "','" . $this->getLogin() . "','" . $this->getSenha() . "'"
                . ",'')";
        $this->objeto->Executar($sql);
    }

    function alterar() {

        $sql = "UPDATE agenciador SET ";
        $sql .= "nome = '" . $this->getNome() . "',endereco ='" . $this->getEndereco() . "',email ='" . $this->getEmail()
                . "',cpf = '" . $this->getCpf() . "',rg = '" . $this->getRg() . "',telefone = '" . $this->getTelefone()
                . "' where id_agenciador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

    function alterarsenha() {
        $sql = "UPDATE agenciador SET ";
        $sql .= "senha = '" . $this->getSenha()
                . "' where id_agenciador = '" . $_SESSION["id"] . "'";

        $this->objeto->Executar($sql);
    }

    function Aprovar($codigo) {
        $sql = "UPDATE agenciador SET ";
        $sql .= "ativo = '1' where id_agenciador = '$codigo'";

        $this->objeto->Executar($sql);
    }

    function Recusar($codigo) {
        $sql = "DELETE from agenciador ";
        $sql .= "where id_agenciador = '$codigo'";
        $this->objeto->Executar($sql);
    }

}
