<?php
session_start();
require "../models/db.php";
$fname=$_SESSION['fname'];
if (is_null($fname)){
  header("Location: ../index.php");
}
echo "Welcome ".$_SESSION['fname']." ".$_SESSION['lname'];
$id=$_SESSION['ownerid'];
$sql = "SELECT * FROM vs566.todos WHERE ownerid = $id";
$results = runQuery($sql);
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


    <div class="container">
      <br><hr class="colorgraph"><br>
        <div class="row">
          <div class="col-md-12">
            <h4>My Tasks</h4>
              <div class="table-responsive">
                <?php foreach($results as $res):?>
                    <tr>
                      <?php $item_status = $res['isdone'];
                        if ($item_status == 0){
                      ?>
                        <td> <?php echo $res['message'];?></td>
                        <td> <?php echo $res['duedate'];?></td>
                        <td>
                          <form action = 'edit.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="edit"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                            <input type="submit" class="btn btn-danger" value="edit"/>
                          </form>
                        </td>
                        <td>
                          <form action = '../View/delete.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="delete"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                            <input type="submit" class="btn btn-danger" value="delete"/>
                          </form>
                        </td>
                        <td>
                          <form action = 'complete.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="complete"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                            <input type="submit" class="btn btn-danger" value="Complete"/>
                          </form>
                        < </td>
                      <?php } ?>
                    </tr>
                  <?php endforeach;?>
                </table>
            </table>
          </div>
      </div>
    </div>
    <hr class="colorgraph">
     <form action = 'add.php'>
      <input type="submit" class="btn btn-info" value="Add New Task"/>
    </form>
</div>
<div class="container">
  <br><hr class="colorgraph"><br>
    <div class="row">
      <div class="col-md-12">
        <h4>Completed Tasks</h4>
          <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped" style="color:black;">
                <thead>
                  <th style="width:65%">Task</th>
                  <th style="width:10%">Due Date</th>
                  <th style="width:10%">Edit</th>
                  <th style="width:10%">Delete</th>
                  <th style="width:10%">Status</th>
                </thead>
                <table>
                   <?php foreach($results as $res):?>
                    <tr>
                      <?php $item_status = $res['isdone'];
                        if ($item_status == 1){
                      ?>
                        <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo $res['message'];?></span></td>
                        <td> <span style='text-decoration:line-through; font-style: italic; color: #c1c1c1'><?php echo $res['duedate'];?></span></td>
                        <td>
                          <form action = 'edit.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="edit"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id']; ?>"/>
                            <input type="submit" class="btn btn-danger" value="edit"/>
                          </form>
                        </td>
                        <td>
                          <form action = '../View/delete.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="delete"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                            <input type="submit" class="btn btn-danger" value="delete"/>
                          </form>
                        </td>
                        <td>
                          <form action = 'uncomplete.php' method = 'post' >
                            <input type="hidden" class="btn btn-danger" name = 'action' value="incomplete"/>
                            <input type="hidden" class="btn btn-danger" name = 'item_id' value="<?php echo $res['id'];?>"/>
                            <input type="submit" class="btn btn-danger" value="Incomplete"/>
                          </form>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php endforeach;?>
                </table>
            </table>
          </div>
      </div>
    </div>
    <hr class="colorgraph">
    <form action = 'logout.php' method = 'post' >
      <input type="submit" class="btn btn-warning" value="Log Out"/>
      </form>

    </div><!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>




