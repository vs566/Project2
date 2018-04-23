<?php
session_start();
require "../models/db.php" ;

$fname= $_POST["fname"];
$lname= $_POST["lname"];
$email= $_POST["email"];
$phone= $_POST["phone"];
$birthday= $_POST["birthday"];
$gender= $_POST["gender"];
$password= $_POST["password"];

$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;
$_SESSION['birthday'] = $birthday;
$_SESSION['gender'] = $gender;
$_SESSION['password'] = $password;


$sql = "select * from vs566.accounts where email = '$email'";
$results = runQuery($sql);
if (count($results) > 0) {
    echo "Email is taken";
} else {

    $sql = "insert into accounts (email, fname, lname, phone, birthday, gender, password) values ('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password');";
    $results = runQuery($sql);
    echo 'User with email: ' . $email . ' has been created.';
    require "../views/login.php";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IS218-002 Building Web Applications</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Building Web Apps</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="#contact">Contact</a></li>

          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>


  </body>
</html>
