<div class="esquerda">
    <?php
    if (isset($_SESSION['login'])) {
        if ($_SESSION["tipo"] == "espectador") {
            echo "<ul><li><a href='/bilheteria/boleto/boletospendentes.php'>Boletos Pendentes</a></li>";
            echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
        } else
        if ($_SESSION["tipo"] == "agenciador") {
            echo "<ul><li><a href='/bilheteria/evento/cadastroEvento.php'>Cadastrar Eventos</a></li>";
            echo "<li><a href='/bilheteria/clienteBilheteria/cadastroBilheteria.php'>"
            . "Cadastrar Bilheteria</a></li>";
            echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
        } else
        if ($_SESSION["tipo"] == "administrador") {
            echo "<ul><li><a href = '/bilheteria/administrador/notificacoes.php'>Relatorios e Notificações</a></li>";
            echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
        } else
        if ($_SESSION["tipo"] == "bilheteria") {
            if (isset($_SESSION['venda_liberada'])) {

                if ($_SESSION["venda_liberada"] == 1) {
                    echo "<ul><li><a href='/bilheteria/caixabilheteria/fecharCaixa.php'>Fechar Caixa</a></li>";
                    echo "<li><a href='/bilheteria/ingresso/reembolso.php'>Reembolso</a></li>";
                    echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
                } else if ($_SESSION["venda_liberada"] == 0) {
                    echo "<ul><li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                    echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
                }
            } else {
                echo "<ul><li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                echo "<li><a href='/bilheteria/funcoes/perfil.php'>Perfil</a></li></ul>";
            }
        }
    } else {
        echo "<h1> Mais Visitados </h1>";
    }
    ?>
</div>