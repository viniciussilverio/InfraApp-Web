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
    echo "<a href='backups.php?key=GAIOLINHA1234' style='text-decoration: none;'><div style='top: 0px; width: 100%; background: black; color: white; height: 50px; text-align: center; font-size: 30px; line-height: 50px;'><strong style='margin-left: 35px;'> Backups: <i class='fas fa-sync-alt' style='font-size: 20px;'></i></strong></div></a><br>";
    $path = "backups/";
    $diretorio = dir($path);
    
    $t = 0;
    echo "<table border=1 style='width: 100%;'>";
    echo "<tr style='background-color: black; color: white;'><th>NOME</th><th>ACTION</th></tr>";

    while($arquivo = $diretorio -> read()){
        if ($t == 0 || $t == 1 || $arquivo == "index.php") {
            $t++;
        } else {
            echo "<tr><td class='break'>".$arquivo."</td><td><a href='".$path.$arquivo."'>DOWNLOAD</a></td></tr>";
        }
    }
    echo "</table>";
    $diretorio -> close();
    echo "</body></html>";
} else {
    header("Location: http://www.google.com");
}

?>