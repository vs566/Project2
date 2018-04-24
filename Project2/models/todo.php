
<?php
  class Todo
  {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;

    public function __construct($id,$owneremail,$ownerid,$createddate,$duedate,$message,$isdone)
    {
      $this->id = $id;
      $this->owneremail = $owneremail;
      $this->ownerid = $ownerid;
      $this->createddate = $createddate;
      $this->duedate = $duedate;
      $this->message = $message;
      $this->isdone = $isdone;
    }

    public static function getTodoList($ownerid)
    {
      $list = [];
      $db = Db::getInstance();
      $list=$db->fetchAll("SELECT * FROM todos WHERE ownerid = '".$ownerid."' ORDER BY duedate ASC");
      return $list;
    }

    public static function createNewTask($account,$duedate,$message)
    {
      echo("<script>console.log('PHP: Create new task:');</script>");
      $date_c = date('Y-m-d G:i:s');
      $date_d = $duedate;
      $message = $message;
      $id = $account["id"];
      $email = $account["email"];

      $db = Db::getInstance();
      $sql = "INSERT INTO todos(owneremail, ownerid, createddate, duedate, message) VALUES ('$email', '$id' , '$date_c', '$date_d', '$message' )";
      $db->execute($sql);
    }
    public static function getTask($id)
    {
      $db = Db::getInstance();
      $sql = "select * from todos where id = ".$id;
      return $db->fetch($sql);
    }

    public static function deleteTask($id)
    {
      $db = Db::getInstance();
      $sql = "delete from todos where id = '".$id."'";
      $db->execute($sql);
    }

    public static function completeTask($id)
    {
      $db = Db::getInstance();
      $sql = "update todos set isdone='1' where id='".$id."'";
      $db->execute($sql);
    }

    public static function incompleteTask($id)
    {
      $db = Db::getInstance();
      $sql = "update todos set isdone='0' where id='".$id."'";
      $db->execute($sql);
    }

    public static function saveTask($id,$duedate,$message)
    {
      $db = Db::getInstance();
      $sql = "update todos set duedate='".$duedate."', message='".$message."' where id='".$id."'";
      echo "<pre>";
      var_dump($sql);
      echo "</pre>";
      $db->execute($sql);
    }
  }
?>
