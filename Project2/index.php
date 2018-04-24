<?php
  require_once('connection.php');
  session_start();
  // ini_set('display_errors', 'On');
  // error_reporting(E_ALL);

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'auth';
    $action     = 'index';
  }

  require_once('views/layout.php');
?>
