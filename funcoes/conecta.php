<?php

class conecta {

    public $con = "";
    public $dados;
    public $total;
    public $conectado = "nao";

    function conectar() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bilheteria";

        $this->con = new mysqli($servername, $username, $password, $dbname);

        if (!$this->con) {
            return -1;
        } else {
            $this->conectado = "sim";
            return 0;
        }
    }

    function Consultar($conexao, $comando) {
        //Forneço o ponteiro de conexão $con e o comando SQL vai no segundo parâmetro
        $rs = mysqli_query($conexao, $comando);

        //Extraímos os dados da resource resultante em um array
        $this->dados = mysqli_fetch_array($rs);

        //Pronto!! eis os dados obtidos
        // var_export($this->dados);
    }

    function Listar($conexao, $comando) {
        $rs = mysqli_query($conexao, $comando);
        $total = mysqli_num_rows($rs);
        for ($i = 0; $i < $total; $i++) {
            $exibe = mysqli_fetch_array($rs);
            echo "<table border='1' cellspacing='1' cellpadding='1'>";
            echo "<tr><td>Codigo:</td>";
            echo "<td>" . $exibe["id"] . "</td>";
            echo "</tr>";
            echo "<tr><td>Nome:</td>";
            echo "<td>" . $exibe["nome"] . "</td>";
            echo "</tr>";
            echo "<tr><td>Endereco:</td>";
            echo "<td>" . $exibe["endereco"] . "</td>";
            echo "</tr>";
            echo "<tr><td>E-mail:</td>";
            echo "<td>" . $exibe["email"] . "</td>";
            echo "</tr>";
            echo "<tr><td>CPF:</td>";
            echo "<td>" . $exibe["cpf"] . "</td>";
            echo "</tr>";
            echo "<tr><td>RG:</td>";
            echo "<td>" . $exibe["rg"] . "</td>";
            echo "</tr>";
            echo "<tr><td>Telefone:</td>";
            echo "<td>" . $exibe["telefone"] . "</td>";
            echo "</tr>";
            echo "<tr><td>Login:</td>";
            echo "<td>" . $exibe["login"] . "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";
        }
    }

    function CountRegistro() {
        return $this->total;
    }

    function RetornaDados() {
        return mysqli_fetch_assoc($this->dados);
    }

    function Executar($comando) {
        $resultado = mysqli_query($this->con, $comando);
    }

    function Fechar() {
        mysqli_close($this->con);
    }

    function RetornaConexao() {
        return $this->con;
    }

}
