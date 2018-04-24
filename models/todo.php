
<?php
  class Todo {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;

    public function __construct($id,$owneremail,$ownerid,$createddate,$duedate,$message,$isdone) {
      $this->id = $id;
      $this->owneremail = $owneremail;
      $this->ownerid = $ownerid;
      $this->createddate = $createddate;
      $this->duedate = $duedate;
      $this->message = $message;
      $this->isdone = $isdone;
    }

    public static function getTodoList($ownerid) {
      $list = [];

      $hostname = "sql2.njit.edu";
      $username = "vs566" ;
      $dbpass = "a6EbTRH7" ;
      $db = new PDO("mysql:host=$hostname;dbname=$username",$username, $dbpass);


      $req = $db->query("SELECT * FROM todos WHERE ownerid = '$ownerid' ORDER BY duedate ASC");

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $todo) {
        $list[] = $todo;
        echo("<script>console.log('PHP: Result count: ".$todo."');</script>");
      }

      return $list;
    }

    // public static function createNewTask($account,$duedate,$message) {

    //     date_default_timezone_set('America/Los_Angeles');
    //     $date_c = date('Y-m-d G:i:s');
    //     $date_d = $duedate;
    //     $message = $message;
    //     $id = $account["ownerid"];
    //     $email = $account["email"];
    //     $account=$account['account'];

    //     $hostname = "sql2.njit.edu";
    //     $username = "vs566" ;
    //     $dbpass = "a6EbTRH7" ;
    //     $db = new PDO("mysql:host=$hostname;dbname=$username",$username, $dbpass);

    //     $sql = "INSERT INTO todos(owneremail, ownerid, createddate, duedate, message) VALUES ('$email', '$id' , '$date_c', '$date_d', '$message' )";
    //     $db->query($sql)
    // }
  }
?>
