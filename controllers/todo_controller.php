<?php
  class TodoController {
    public function index() {

      echo("<script>console.log('PHP: TODO INDEX! ');</script>");
      $account=$_SESSION['account'];

        echo("<script>console.log('PHP: FETCH! ');</script>");

      $results=Todo::getTodoList($account["id"]);

      echo("<script>console.log('PHP: Result count: ".count($results)."');</script>");

      require_once('views/todo/index.php');
    }

    public function addTask(){

        echo("<script>console.log('PHP: BE4 Account: ".$account."');</script>");
        $account=$_SESSION['account'];
        echo("<script>console.log('PHP: AFT Account: ".$account."');</script>");

      echo("<script>console.log('PHP: ADD TASK! ');</script>");
      require_once('views/todo/addTask.php');
    }

    public function newTask(){
        echo("<script>console.log('PHP: ADDING NEW TASK! ');</script>");
        $account=$_SESSION['account'];
        echo("<script>console.log('PHP: Account: ".$account."');</script>");

        // Todo::createNewTask($account,$_POST["duedate"],$_POST["message"])
        return call("todo","index");
    }
  }
?>
