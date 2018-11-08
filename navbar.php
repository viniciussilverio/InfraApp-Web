<?php
    echo '
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    ';
    echo "
        <style>
            #navpanel { /* Stiles of the navbar */
                width: 0px;
                left: 0px;
                background-color: rgb(255, 255, 255);
                height: 100%;
                overflow-x: hidden;
                position: fixed;
                top: 0px;
                transition: 0.5s;
                z-index: 1000;
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            }
        </style>
        <script>
            function show() {
                document.getElementById('navpanel').style.width = '300px';
            }
            function hide() {
                document.getElementById('navpanel').style.width = '0px';
            }
        </script>
        </head>
        <body style='border: 0px; padding: 0px; margin: 0px;'>

    <a onclick='show()' style='cursor: pointer; color: white; position: fixed; top: 10px; left: 20px; font-size: 30px;'><i class='fas fa-bars'></i></a>
    <div id='navpanel'> <!-- Slide panel -->
      <div style='height: 100%; width: 300px'> <!-- Div used to avoid the resizing when hidding -->
      <a onclick='hide()' style='cursor: pointer;'><div style='font-size: 30px; text-align: center; background-color: black; width: 100%; height: 50px; color: white; line-height: 50px;'><strong>Fechar</strong></div></a>
      
      <a href='index.php?key=GAIOLINHA1234' style='color: black;'><div style='font-size: 30px; text-align: center; width: 100%; height: 50px; line-height: 50px;'><strong>Servers</strong></div></a>
      
      <a href='backups.php?key=GAIOLINHA1234' style='color: black;'><div style='font-size: 30px; text-align: center; width: 100%; height: 50px; line-height: 50px;'><strong>Backups</strong></div></a>
      
      <a href='arquivos.php?key=GAIOLINHA1234' style='color: black;'><div style='font-size: 30px; text-align: center; width: 100%; height: 50px; line-height: 50px;'><strong>Arquivos</strong></div></a>
      
      </div>
    </div>"
?>