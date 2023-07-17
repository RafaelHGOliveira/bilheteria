<?php
include "../estilo/topo.php";
include "../estilo/esquerda.php";
include "../estilo/direita.php";
?>
<div class="divEstilizada" style="height: 850px">
    <h2>Evento</h2>
    <div>
        <form action="dadosEvento.php" method="post" enctype="multipart/form-data">
            <br>
            <div class="form-group">
                <label class="control-label col-sm-6" for="nome">Imagem do Evento:</label>
                <div class="col-sm-10">
                    <input type="file" name="arquivo" />
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nome">Nome do Evento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" placeholder="Digite o nome do evento">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-4" for="dataevento">Data do Evento:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dataevento" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-5" for="horarioinicio">Horario do Evento:</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="horarioinicio" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-3" for="duracao">Duração:</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="duracao" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-3" for="endereco">Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-5" for="precoingresso">Valor do Ingresso:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="precoingresso" placeholder="Digite valor o ingresso">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-4" for="tipoevento">Tipo do Evento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipoevento" placeholder="Digite o tipo do evento">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-6" for="idademinima">Idade Minima Permitida:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="idademinima" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-3" for="descricao">Descrição:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descricao" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-3" for="capacidade">Capacidade:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="capacidade" placeholder="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-5" for="lugaresnumerados">Lugares Numerados?</label>
                <div class="col-sm-2">
                    <input type="radio" name="lugaresnumerados" value="sim"> Sim<br>
                    <input type="radio" checked="checked" name="lugaresnumerados" value="nao"> Não<br>
                </div>
            </div>
            <br><br>

            <div class="col-sm-10">
                <button type="submit" class="btn btn-default">OK</button>
                <button type="reset" class="btn btn-default">Limpar</button>
            </div>
        </form>
    </div>
</div>

<?php
include "../estilo/rodape.php";
?>
