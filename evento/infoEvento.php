<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bilheteria/estilo/pagina.css"/>
        <title></title>
        <script language="JavaScript">
            function pergunta() {
                if (confirm('Deseja realmente cancelar este evento ?')) {
                    document.cancelar.submit()
                }
            }
        </script>
    </head>
    <body>
        <div style="width: 100%" align="center">
            <div class="cabecalho">
                <a href="/bilheteria/index.php"><img src="/bilheteria/imagens/LOGO_120x75.png" style="width: 250px"/></a><br>
                <?php
                session_start();
                if (!isset($_SESSION['login'])) {
                    echo "<a href='/bilheteria/funcoes/loginTela.php' align='right'>Login/</a>";
                    echo "<a href='/bilheteria/funcoes/opcao.php' align='right'>Cadastre-se</a>";
                } else {
                    echo "<a href='/bilheteria/funcoes/perfil.php' align='right'>Bem Vindo, " . $_SESSION['nome'] . "/</a>";
                    echo "<a href='/bilheteria/funcoes/logout.php' align='right'>logout</a>";
                }
                ?>
                <ul>
                    <li><a href="/bilheteria/index.php">Home</a></li>
                    <li><a href="#">Shows</a></li>
                    <li><a href="#">Festas e Festivais</a></li>
                    <li><a href="#">Teatros</a></li>
                    <li><a href="#">Exposições</a></li>
                    <li><a href="#">Esportivos</a></li>
                </ul>
            </div>
            <div class="esquerda">
                <ul>                    <?php
                    if (isset($_SESSION['login'])) {
                        if ($_SESSION["tipo"] == "agenciador") {
                            echo "<li><a href='/bilheteria/evento/cadastroEvento.php'>Cadastrar Eventos</a></li>";
                            echo "<li><a href='/bilheteria/clienteBilheteria/cadastroBilheteria.php'>"
                            . "Cadastrar Bilheteria</a></li>";
                        } else
                        if ($_SESSION["tipo"] == "administrador") {
                            echo "<li><a href = '/bilheteria/administrador/notificacoes.php'>Relatorios e Notificações</a></li>";
                        } else
                        if ($_SESSION["tipo"] == "bilheteria") {
                            if (isset($_SESSION['venda_liberada'])) {

                                if ($_SESSION["venda_liberada"] == 1) {
                                    echo "<li><a href='/bilheteria/caixabilheteria/fecharCaixa.php'>Fechar Caixa</a></li>";
                                    echo "<li><a href='/bilheteria/ingresso/reembolso.php'>Reembolso</a></li>";
                                } else if ($_SESSION["venda_liberada"] == 0) {
                                    echo "<li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                                }
                            } else
                                echo "<li><a href='/bilheteria/caixabilheteria/abrindoCaixa.php'>Abrir Caixa</a></li>";
                        }
                    }
                    ?></ul>
            </div>
            <div class="direita">
                <h1> Mais Visitados </h1>
            </div>
            <?php
            include "../funcoes/conecta.php";

            $id_evento = $_GET["id"];
            $objeto = new conecta();
            if ($objeto->conectar() == 0) {
                $conectado = $objeto->RetornaConexao();
                $sql = "SELECT * from evento where id_evento ='" . $id_evento . "'";
                $rs = mysqli_query($conectado, $sql);
                $total = mysqli_num_rows($rs);

                echo "<table class='table table-striped' style='width: 70%' align='center'>";

                for ($i = 0; $i < $total; $i++) {
                    $exibe = mysqli_fetch_array($rs);
                    echo "<tr><td>Nome: " . $exibe["nome"] . "</td></tr>";
                    echo "<tr><td>Data do Evento: " . date('d/m/Y', strtotime($exibe["dataevento"])) . "</td></tr>";
                    echo "<tr><td>Horario: " . $exibe["horarioInicio"] . "</td></tr>";
                    echo "<tr><td>Duração: " . $exibe["duracao"] . "</td></tr>";
                    echo "<tr><td>Preço do Ingresso: R$" . $exibe["preco_ingresso"] . "</td></tr>";
                    echo "<tr><td>Preço de Meio Ingresso: R$" . $exibe["preco_ingresso"] / 2 . "</td></tr>";
                    $_SESSION["valor"] = $exibe["preco_ingresso"];
                    echo "<tr><td>Tipo do Evento: " . $exibe["tipoEvento"] . "</td></tr>";
                    echo "<tr><td>Endereço: " . $exibe["endereco"] . "</td></tr>";
                    echo "<tr><td>Idade minima permitida: " . $exibe["idadeMinimaPermitida"] . "</td></tr>";
                    echo "<tr><td>Descrição: " . $exibe["descricao"] . "</td></tr>";
                    echo "<tr><td>Capacidade: " . $exibe["capacidade"] . "</td></tr>";
                    echo "<tr><td>Ingressos restantes: " . ($exibe["capacidade"] - $exibe["vendidos"]) . "</td></tr>";
                    $_SESSION["permissao"] = $exibe["id_agenciador"];
                    if ($exibe["lugaresnumerados"] == 1) {
                        echo "<tr><td>Locais Numerados: Sim</td></tr>";
                    } else
                    if ($exibe["lugaresnumerados"] == 0) {
                        echo "<tr><td>Locais Numerados: Não</td></tr>";
                    }

                    if ($exibe["capacidade"] - $exibe["vendidos"] > 0) {
                        if (isset($_SESSION['login'])) {
                            if ($_SESSION["tipo"] == "bilheteria") {
                                if (isset($_SESSION['venda_liberada'])) {
                                    if ($_SESSION["venda_liberada"] == 1) {
                                        echo "<form action='venderIngresso.php?id=" . $exibe['id_evento'] . "' method='post'>";
                                        echo "<tr><td><button type='submit' class='btn btn-default'>Vender</button></td></tr>";
                                        echo "</form>";
                                    }
                                }
                            } else if ($_SESSION["tipo"] == "agenciador") {
                                if ($_SESSION["permissao"] == $_SESSION["id"]) {
                                    echo "<form name='cancelar' action='cancelarEvento.php?id=" . $exibe['id_evento'] . "' method='post'>";
                                    echo "<tr><td><input type='button' class='btn btn-default' onclick='pergunta()' value='Cancelar Evento'></td><tr>";
                                    echo "</form>";
                                }
                            } else if ($_SESSION["tipo"] == "espectador") {
                                if ($exibe["lugaresnumerados"] == 1) {
                                    echo "<form action='venderIngresso.php?id=" . $exibe['id_evento'] . "' method='post'>";
                                    echo "<tr><td><button type='submit' class='btn btn-default'>Comprar</button></td></tr>";
                                    echo "</form>";
                                } else {
                                    echo "<form action='meia.php?id=" . $exibe['id_evento'] . "' method='post'>";
                                    echo "<tr><td><button type='submit' class='btn btn-default'>Comprar</button></td><tr>";
                                    echo "</form>";
                                }
                            }
                        }
                    }
                }
                echo "</table>";
            }
            ?>
            <div class="rodape" style="margin-top: 700px">
                Copyright © Buy & Pay.
            </div>
        </div>
    </body>
</html>