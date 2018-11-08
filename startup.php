<?php
$key = isset($_GET['key']) ? addslashes(trim($_GET['key'])) : FALSE;
if ($key === 'GAIOLINHA1234') {
  exec("startup.bat");
  header("Location: index.php?key=GAIOLINHA1234");
} else {
  header("Location: http://www.google.com");
}
?>