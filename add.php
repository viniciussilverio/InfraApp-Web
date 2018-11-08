<?php
$ip = isset($_GET['ip']) ? addslashes(trim($_GET['ip'])) : FALSE;
$name = isset($_GET['name']) ? addslashes(trim($_GET['name'])) : FALSE;
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
  if (is_null($ip) || $ip == '' || $ip == NULL || $ip == FALSE) {
    //Gravar log de erros
    header("Location: index.php?key=GAIOLINHA1234");
    exit;
  } 
  require "banco.php";
  $conn = new mysqli($hostname, $username, $password, $dbName);
  if ($conn->connect_error) {
    //Gravar log de erros
    die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
  } 
  $sql = "INSERT INTO `server` (`ip`, `name`, `up`) VALUES ('$ip', '$name', '0');";
  
  if (!$conn->query($sql)) {
    //Gravar log de erros
    die("Este IP já está sendo monitorado");
    echo "<a href='index.php'>Voltar</a>";
  } else {
      header("Location: index.php?key=GAIOLINHA1234");
  }
  $conn->close();
} else {
  header("Location: http://www.google.com");
}
?>