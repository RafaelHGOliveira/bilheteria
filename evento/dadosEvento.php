<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
include "evento.php";
$endereco = $_POST["endereco"];
$nome = $_POST["nome"];
$dataevento = $_POST["dataevento"];
$horarioinicio = $_POST["horarioinicio"];
$duracao = $_POST["duracao"];
$precoingresso = $_POST["precoingresso"];
$tipoevento = $_POST["tipoevento"];
$idademinima = $_POST["idademinima"];
$descricao = $_POST["descricao"];
$lugaresnumerados = $_POST["lugaresnumerados"];
$capacidade = $_POST["capacidade"];
$id_agenciador = $_SESSION["id"];
$diretorio = '../uploads/' . $nome;
if (!is_dir('../uploads'))
    mkdir('../uploads');
if (!is_dir($diretorio))
    mkdir($diretorio);
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../uploads/' . $nome . '/';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
// Faz a verificação da extensão do arquivo
$nomedaimagem = explode('.', $_FILES['arquivo']['name']);
$ultimonome = end($nomedaimagem);
$extensao = strtolower($ultimonome);
if (array_search($extensao, $_UP['extensoes']) == true) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    exit;
}
// Faz a verificação do tamanho do arquivo
if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    exit;
}
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
    // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = md5(time()) . '.jpg';
} else {
    // Mantém o nome original do arquivo
    $nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
    // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
} else {
    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
    echo "Não foi possível enviar o arquivo, tente novamente";
}
$diretoriofinal = "/bilheteria/uploads/$nome/$nome_final";

$evento = new evento();
$evento->setEndereco($endereco);
$evento->setNome($nome);
$evento->setDataevento($dataevento);
$evento->setHorarioinicio($horarioinicio);
$evento->setDuracao($duracao);
$evento->setPrecoingresso($precoingresso);
$evento->setTipoevento($tipoevento);
$evento->setIdademinima($idademinima);
$evento->setDescricao($descricao);
$evento->setDiretorio($diretoriofinal);
if ($lugaresnumerados == 'sim')
    $evento->setLugaresnumerados(1);
else
    $evento->setLugaresnumerados(0);
$evento->setCapacidade($capacidade);
$evento->setId_agenciador($id_agenciador);
$evento->gravar();
?>
<div>
    <h1>Evento Cadastrado!</h1>
</div>
<?php
include "../estilo/rodape.php";
?>



