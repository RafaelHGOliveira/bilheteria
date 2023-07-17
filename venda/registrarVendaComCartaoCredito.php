<?php
session_start();
include "cartao.php";


$nome_titular = $_POST["nome_titular"];
$data_nascimento = $_POST["data_nascimento"];
$cpf = $_POST["cpf"];
$numero_cartao = $_POST["numero_cartao"];
$data_vencimento = $_POST["id_select_ano"];
$data_vencimento .= $_POST["id_select_mes"];
$id_espectador = $_SESSION["id"];

if (($data_nascimento <= '1998-12-31') && ($data_vencimento > (date("Y-m")) )) {
    $cartao = new cartao();
    $cartao->setData_nascimento($data_nascimento);
    $cartao->setData_vencimento($data_vencimento);
    $cartao->setNome_titular($nome_titular);
    $cartao->setCpf($cpf);
    $cartao->setNumero_cartao($numero_cartao);
    $cartao->setId_espectador($id_espectador);
    $cartao->gravar();
 
}
?>
<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>

<div>
<?php
if ($data_nascimento > '1998-12-31') {
    echo '<h1>Data de Nascimento Inválida</h1>';
    echo "<a href='/bilheteria/venda/venderIngressosComCartaoCredito.php'>Voltar</a></li>";
} else if ($data_vencimento <= date("Y-m")) {
    echo '<h1>Data de Vencimento Inválida</h1>';
    echo "<a href='/bilheteria/venda/venderIngressosComCartaoCredito.php'>Voltar</a></li>";
} else {
    $id_evento = $_GET["id_evento"];
    $pagamento = $_GET["pagamento"];
    $opcao = $_GET["opcao"];
    header("location:/bilheteria/evento/compraConcluida.php?id_evento=" . $id_evento . "&opcao=" . $opcao . "&pagamento=" . $pagamento . "");
}
?>
</div>
    <?php
    include "../estilo/rodape.php";
    ?>




