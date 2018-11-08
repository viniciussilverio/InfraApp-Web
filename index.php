<?php
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
    echo "
    <html>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <head>
            <title>Gestor de Servidores</title>
            <style>
                .break {

                    /* These are technically the same, but use both */
                    overflow-wrap: break-word;
                    word-wrap: break-word;
                
                    -ms-word-break: break-all;
                    /* This is the dangerous one in WebKit, as it breaks things wherever */
                    word-break: break-all;
                    /* Instead use this non-standard one: */
                    word-break: break-word;
                
                    /* Adds a hyphen where the word breaks, if supported (No Blink) */
                    -ms-hyphens: auto;
                    -moz-hyphens: auto;
                    -webkit-hyphens: auto;
                    hyphens: auto;
                
                }
            </style>
    ";
    require "navbar.php";
    echo "<a href='index.php?key=GAIOLINHA1234' style='text-decoration: none;'><div style='top: 0px; width: 100%; background: black; color: white; height: 50px; text-align: center; font-size: 30px; line-height: 50px;'><strong style='margin-left: 35px;'> Gestor de Servers <i class='fas fa-sync-alt' style='font-size: 20px;'></i></strong></div></a><br>";
    require "banco.php";
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
    //Gravar log de erros
    die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
    } 
    $sql = "SELECT * FROM `server`;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $values = "";
        while($row = $result->fetch_assoc()) {
            //exec('wscript servers.vbs "' . $row["ip"] . '"');
            exec('ping -n 1 -w 10 ' . $row['ip'], $cmd, $rt);
            $values = "UPDATE `server` SET `up` = '" . ($rt ? 0: 1) . "' WHERE `server`.`ip` = '" . $row['ip'] . "';";
            if (!$conn->query($values)) {
                //Gravar log de erros
                die("Erro ao apagar os dados do BD");
            }
        }
    }
    if (!$conn->query($sql)) {
        //Gravar log de erros
        die("Erro na leitura dos dados do BD");
    }

    // Imprime na tela
    $sql = "SELECT * FROM `server`;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table border=1 style='width: 100%;'>";
        echo "<tr style='background-color: black; color: white;'><th>NOME</th><th>IP</th><th>STATUS</th><th>ACTION</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td class='break'>" . $row["name"]. "</td><td>" . $row["ip"]. "</td><td>" . ($row["up"] ? "Up" : "Down"). "</td><td><a href='delete.php?key=GAIOLINHA1234&ip=" . $row["ip"] . "'>Delete</a></td></tr>";
        }
        echo "</table>";
    }
    if (!$conn->query($sql)) {
        //Gravar log de erros
        die("Erro na leitura dos dados do BD");
    }
    $conn->close();
    echo '
    <br>
    <form method="GET" action="add.php">
    <input type="hidden" name="key" value="GAIOLINHA1234">
    <table style="width: 100%;">
    <tr><td>Nome:</td><td><input type="text" name="name"style="width: 100%;"></td></tr>
    <tr><td>IP:</td><td><input type="text" name="ip"style="width: 100%;"></td></tr>
    <tr><td><input type="submit" name="Adicionar" value="Adicionar"></td><td><input type="reset" name="Limpar" value="Limpar"></td></tr>
    </table>
    </form>
    ';
    echo "</body></html>";
} else {
    header("Location: http://www.google.com");
}

?>