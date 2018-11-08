<?php
$ip = isset($_GET['ip']) ? addslashes(trim($_GET['ip'])) : FALSE;
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
  if (is_null($ip)) {
    //Gravar log de erros
    die("Dados inválidos");
    header("Location: index.php?key=GAIOLINHA1234");
    exit;
  } 
  require "banco.php";
  $conn = new mysqli($hostname, $username, $password, $dbName);
  if ($conn->connect_error) {
    //Gravar log de erros
    die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
  } 
  $sql = "DELETE FROM `server` WHERE `server`.`ip` = '$ip';";
  
  if (!$conn->query($sql)) {
    //Gravar log de erros
    die("Erro na gravação dos dados no BD");
  } else {
    header("Location: index.php?key=GAIOLINHA1234");
  }
  $conn->close();
} else {
  header("Location: http://www.google.com");
}
?>