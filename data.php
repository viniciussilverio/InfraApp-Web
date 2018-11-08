
<?php
$ip = isset($_GET['ip']) ? addslashes(trim($_GET['ip'])) : FALSE;
$up = isset($_GET['up']) ? addslashes(trim($_GET['up'])) : FALSE;
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
  if (is_null($ip)) {
    //Gravar log de erros
    die("Dados inválidos");
  } 
  require "banco.php";
  $conn = new mysqli($hostname, $username, $password, $dbName);
  if ($conn->connect_error) {
    //Gravar log de erros
    die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
  } 
  $sql = "UPDATE `server` SET `up` = '$up' WHERE `server`.`ip` = '$ip';";
  
  if (!$conn->query($sql)) {
    //Gravar log de erros
    die("Erro ao apagar os dados do BD");
    echo "<a href='index.php?key=GAIOLINHA1234'>Voltar</a>";
  }
  $conn->close();
} else {
  header("Location: http://www.google.com");
}
?>