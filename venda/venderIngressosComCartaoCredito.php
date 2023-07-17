<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada" style="height: 700px; width: 35%; text-align:left">

    <div>
        <?php
        $id_evento = $_GET["id_evento"];
        $pagamento = $_GET["pagamento"];
        $opcao = $_SESSION["meia"];
        if (isset($_GET["cadeira"]))
            $_SESSION["cadeira"] = $_GET["cadeira"];
        else
            $_SESSION["cadeira"] = 0;

        echo "<form action='registrarVendaComCartaoCredito.php?id_evento=" . $id_evento . "&opcao=" . $opcao . "&pagamento=" . $pagamento . "' method='post'>";
        ?>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-5" for="nome_titular">Nome do Titular:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome_titular" placeholder="Digite o nome do titular">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-5" for="data_nascimento">Data de Nacimento:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="data_nascimento" placeholder="">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-5" for="cpf">CPF:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="cpf" placeholder="Digite o CPF">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-5" for="numero_cartao">Número do Cartão:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="numero_cartao" placeholder="">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label col-sm-5" for="cod_seguranca">Código de Segurança:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="cod_seguranca" placeholder="Digite o codigo de seguranca">
            </div>
        </div>
        <br>
        <br><br>
        <div class="form-group" 
             <br>
            <label class="control-label col-sm-5">Bandeira do Cartão:</label>
            <div class="col-sm-10">

                <select name="id_select_banco">

                    <option value="">Visa</option>
                    <option value="">MasterCard</option>
                    <option value="">American Express</option>
                    <option value="">Diners Club International</option>

                </select>
            </div>
        </div>
        <br><br>

        <div class="form-group" 
             <br>
            <label class="control-label col-sm-5">Mês de Vencimento:</label>
            <div class="col-sm-10">
                <select name="id_select_mes">

                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>


                </select>
            </div>
        </div>
        <br>
        <div class="form-group" 
             <br>
            <label class="control-label col-sm-5">Ano de Vencimento:</label>
            <div class="col-sm-10">
                <select name="id_select_ano">

                    <option value="2016-">2016</option>
                    <option value="2017-">2017</option>
                    <option value="2018-">2018</option>
                    <option value="2019-">2019</option>
                    <option value="2020-">2020</option>
                    <option value="2021-">2021</option>
                    <option value="2022-">2022</option>
                    <option value="2023-">2023</option>
                    <option value="2024-">2024</option>
                    <option value="2025-">2025</option>
                    <option value="2026-">2026</option>
                    <option value="2027-">2027</option>
                    <option value="2028-">2028</option>
                    <option value="2029-">2029</option>
                    <option value="2030-">2030</option>
                    <option value="2031-">2031</option>
                    <option value="2032-">2032</option>

                </select>
            </div>
        </div>
        <br><br>

        <div class="col-sm-5">
            <br>
            <button type="submit" class="btn btn-default">OK</button>
            <button type="reset" class="btn btn-default">Limpar</button>
        </div>
        </form>
    </div>
</div>

<?php
include "../estilo/rodape.php";
?>


