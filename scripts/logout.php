<?php
if (!isset($rootdr)) {
  $rootdr = "../";
}
session_start();
session_destroy();
header('Location: ' . $rootdr . 'index.php');
?>