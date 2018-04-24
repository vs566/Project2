<?php
session_start();
$item_id = $_POST['item_id'];
$_SESSION['item_id'] = $item_id;
header("Location: ../controllers/completetask.php");
?>
