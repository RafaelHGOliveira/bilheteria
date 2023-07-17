<?php

include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "conecta.php";
$objeto = new conecta();
if ($objeto->conectar() == 0) {
    $conectado = $objeto->RetornaConexao();
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "Select * from espectador where login='" . $login . "' and senha='" . $senha . "'";
    $objeto->Consultar($conectado, $sql);
    if ($objeto->dados != NULL) {
        $_SESSION["nome"] = $objeto->dados["nome"];
        $_SESSION["login"] = $objeto->dados["login"];
        $_SESSION["senha"] = $objeto->dados["senha"];
        $_SESSION["email"] = $objeto->dados["email"];
        $_SESSION["cpf"] = $objeto->dados["cpf"];
        $_SESSION["rg"] = $objeto->dados["rg"];
        $_SESSION["endereco"] = $objeto->dados["endereco"];
        $_SESSION["id"] = $objeto->dados["id_espectador"];
        $_SESSION["tipo"] = "espectador";
        header("location:/bilheteria/index.php");
    }
    $sql = "Select * from agenciador where login='" . $login . "' and senha='" . $senha . "'";
    $objeto->Consultar($conectado, $sql);
    if ($objeto->dados != NULL) {
        if ($objeto->dados["ativo"] == 1) {
            $_SESSION["nome"] = $objeto->dados["nome"];
            $_SESSION["login"] = $objeto->dados["login"];
            $_SESSION["senha"] = $objeto->dados["senha"];
            $_SESSION["email"] = $objeto->dados["email"];
            $_SESSION["cpf"] = $objeto->dados["cpf"];
            $_SESSION["rg"] = $objeto->dados["rg"];
            $_SESSION["telefone"] = $objeto->dados["telefone"];
            $_SESSION["endereco"] = $objeto->dados["endereco"];
            $_SESSION["id"] = $objeto->dados["id_agenciador"];
            $_SESSION["tipo"] = "agenciador";
            header("location:/bilheteria/index.php");
        } else
            header("location:/bilheteria/index.php");
    }
    $sql = "Select * from administrador where login='" . $login . "' and senha='" . $senha . "'";
    $objeto->Consultar($conectado, $sql);
    if ($objeto->dados != NULL) {
        $_SESSION["nome"] = $objeto->dados["nome"];
        $_SESSION["login"] = $objeto->dados["login"];
        $_SESSION["senha"] = $objeto->dados["senha"];
        $_SESSION["email"] = $objeto->dados["email"];
        $_SESSION["id"] = $objeto->dados["id_administrador"];
        $_SESSION["tipo"] = "administrador";
        header("location:/bilheteria/index.php");
    }
    $sql = "Select * from clientebilheteria where login='" . $login . "' and senha='" . $senha . "'";
    $objeto->Consultar($conectado, $sql);
    if ($objeto->dados != NULL) {
        $_SESSION["nome"] = $objeto->dados["nome"];
        $_SESSION["login"] = $objeto->dados["login"];
        $_SESSION["senha"] = $objeto->dados["senha"];
        $_SESSION["email"] = $objeto->dados["email"];
        $_SESSION['endereco'] = $objeto->dados["endereco"];
        $_SESSION["id"] = $objeto->dados["id_clientebilheteria"];
        $_SESSION["tipo"] = "bilheteria";
        header("location:/bilheteria/index.php");
    }
    echo "<h1>Login e/ou senha incorretos</h1>";
    echo "<a href='/bilheteria/funcoes/loginTela.php' align='right'>Clique aqui para tentar novamente</a>";
}
?>
<?php

include "../estilo/rodape.php";
?>


