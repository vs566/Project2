<?php

session_start();
unset($_SESSION['fname']);
header("Location: ../views/todo.php");

?>
