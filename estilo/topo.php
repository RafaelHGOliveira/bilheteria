<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bilheteria/estilo/pagina.css"/>
        <title></title>
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
                        echo "Bem Vindo, " . $_SESSION['nome'] . "/";
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