<?php
  class TodoController {
    public function index() {
      $account=$_SESSION['account'];
      $results=Todo::getTodoList($account["id"]);
      require_once('views/todo/index.php');
    }

    public function addTask()
    {
      require_once('views/todo/addTask.php');
    }

    public function editTask()
    {
      $id = $_POST['item_id'];
      $task = Todo::getTask($id);
      require_once('views/todo/editTask.php');
    }

    public function createTask()
    {
      $account=$_SESSION['account'];
      Todo::createNewTask($account,$_POST["duedate"],$_POST["message"]);
      header("Location: ?controller=todo&action=index");
      exit();
    }

    public function deleteTask()
    {
      $id = $_POST['item_id'];
      Todo::deleteTask($id);
      header("Location: ?controller=todo&action=index");
      exit();
    }

    public function completeTask()
    {
      $id = $_POST['item_id'];
      Todo::completeTask($id);
      header("Location: ?controller=todo&action=index");
      exit();
    }

    public function incompleteTask()
    {
      $id = $_POST['item_id'];
      Todo::incompleteTask($id);
      header("Location: ?controller=todo&action=index");
      exit();
    }

    public function saveTask()
    {
      $id = $_POST['item_id'];
      $duedate = $_POST['duedate'];
      $message = $_POST['task'];
      Todo::saveTask($id,$duedate,$message);
      header("Location: ?controller=todo&action=index");
      exit();
    }

  }
?>
