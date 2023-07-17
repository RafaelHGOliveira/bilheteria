<?php

include "../funcoes/conecta.php";

class venda {

    private $tipocomprador;
    private $logincomprador;
    private $datavenda;
    private $meia;
    private $cadeira;
    private $id_evento;
    private $tipopagamento;
    private $id_venda;

    function __construct() {
        $this->objeto = new conecta();
        $this->objeto->conectar();
    }

    function __destruct() {
        $this->objeto->Fechar();
    }

    function getTipocomprador() {
        return $this->tipocomprador;
    }

    function getLogincomprador() {
        return $this->logincomprador;
    }

    function getDatavenda() {
        return $this->datavenda;
    }

    function getMeia() {
        return $this->meia;
    }

    function getCadeira() {
        return $this->cadeira;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getTipopagamento() {
        return $this->tipopagamento;
    }

    function getId_venda() {
        return $this->id_venda;
    }

    function setTipocomprador($tipocomprador) {
        $this->tipocomprador = $tipocomprador;
    }

    function setLogincomprador($logincomprador) {
        $this->logincomprador = $logincomprador;
    }

    function setDatavenda($datavenda) {
        $this->datavenda = $datavenda;
    }

    function setMeia($meia) {
        $this->meia = $meia;
    }

    function setCadeira($cadeira) {
        $this->cadeira = $cadeira;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setTipopagamento($tipopagamento) {
        $this->tipopagamento = $tipopagamento;
    }

    function setId_venda($id_venda) {
        $this->id_venda = $id_venda;
    }

    function gravar() {
        $sql = "INSERT INTO venda VALUES ";
        $sql .= "('" . $this->getTipocomprador() . "','" . $this->getLogincomprador()
                . "','" . $this->getDatavenda() . "','" . $this->getMeia()
                . "','" . $this->getCadeira() . "','" . $this->getId_evento()
                . "','" . $this->getTipopagamento() . "', NULL)";
        if (isset($_SESSION["meia"])) {
            if ($_SESSION["meia"] == "sim")
                $_SESSION["meia"] = 1;
            else
                $_SESSION["meia"] = 0;
            $sql = "INSERT INTO venda VALUES ";
            $sql .= "('" . $this->getTipocomprador() . "','" . $this->getLogincomprador()
                    . "','" . $this->getDatavenda() . "','" . $_SESSION["meia"]
                    . "','" . $this->getCadeira() . "','" . $this->getId_evento()
                    . "','" . $this->getTipopagamento() . "', NULL)";
        }
        $this->objeto->Executar($sql);
        if ($this->getTipopagamento() == "boleto") {
            $sql = "select max(venda.id_venda) as id_venda from venda";
            $conectado = $this->objeto->RetornaConexao();
            $rs = mysqli_query($conectado, $sql);
            $exibe = mysqli_fetch_array($rs);
            $data_venc = date("Y-m-d", time() + 86400);
            $sql = "insert into boleto values (''," . $exibe["id_venda"] . ",'" . $data_venc . "','')";
            $this->objeto->Executar($sql);

            $sql = "select preco_ingresso, meia from ingresso inner join venda on ingresso.id_venda = venda.id_venda 
                inner join evento on venda.id_evento = evento.id_evento 
                order by venda.id_venda desc limit 1";

            $rs = mysqli_query($conectado, $sql);
            $exibe = mysqli_fetch_array($rs);
            echo "1 " . $_SESSION["valor"] . "<br>";
            echo "2 " . $exibe["preco_ingresso"];
            if (isset($exibe["preco_ingresso"])) {
                if ($exibe["meia"] == 1)
                    $_SESSION["valor"] = $exibe["preco_ingresso"] / 2;
                else
                    $_SESSION["valor"] = $exibe["preco_ingresso"];
            }
            $_SESSION["venc"] = $data_venc;
            echo $_SESSION["valor"];
            header("location:/bilheteria/boleto/boleto_bb.php");
        }
        if ($this->getTipopagamento() == "cartao") {
            $sql = "select max(venda.id_venda) as id_venda from venda";
            $conectado = $this->objeto->RetornaConexao();
            $rs = mysqli_query($conectado, $sql);
            $exibe = mysqli_fetch_array($rs);
            $sql = "insert into cartao values (''," . $exibe["id_venda"] . ",'')";
            $this->objeto->Executar($sql);
        }
    }

}
