<?php
$target_dir = "files/";
$file = isset($_GET['arquivo']) ? addslashes(trim($_GET['arquivo'])) : FALSE;
$target_file = $target_dir . $file;
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
  if (is_null($file)) {
    //Gravar log de erros
    die("Dados inválidos");
    header("Location: index.php?key=GAIOLINHA1234");
    exit;
  } 
  if (!unlink($target_file)) {
    //Gravar log de erros
    die("Erro ao apagar arquivo");
  } else {
    header("Location: arquivos.php?key=GAIOLINHA1234");
  }
  $conn->close();
} else {
  header("Location: http://www.google.com");
}
?>