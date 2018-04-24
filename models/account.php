
<?php
  class Account {
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;

    public function __construct($id, $email, $fname,$lname,$phone,$birthday,$gender,$password) {
      $this->id      = $id;
      $this->email  = $email;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->phone = $phone;
      $this->birthday = $birthday;
      $this->gender = $gender;
      $this->password = $password;
    }

      //   public static function all() {
      //     $list = [];
      //     $db = Db::getInstance();
      //     $req = $db->query('SELECT * FROM accounts');
      //
      //     // we create a list of Post objects from the database results
      //     foreach($req->fetchAll() as $account) {
      //       $list[] = new Account($account['id'], $account['email'], $account['fname'], $account['lname'], $account['phone'], $account['birthday'], $account['gender'], $account['password']);
      //     }
      //
      //     return $list;
      //   }
      //
      //   public static function find($id) {
      //     $db = Db::getInstance();
      //     $id = intval($id);
      //     $req = $db->prepare('SELECT * FROM accounts WHERE id = :id');
      //     // the query was prepared, now we replace :id with our actual $id value
      //     $req->execute(array('id' => $id));
      //     $account = $req->fetch();
      //
      //     return new Account($account['id'], $account['email'], $account['fname'], $account['lname'], $account['phone'], $account['birthday'], $account['gender'], $account['password']);
      // }

    public static function getAccount($email) {
      $hostname = "sql2.njit.edu";
      $username = "vs566" ;
      $dbpass = "a6EbTRH7" ;
      $db = new PDO("mysql:host=$hostname;dbname=$username",$username, $dbpass);

      $req = $db->prepare('SELECT * FROM accounts WHERE email = :email');
      $req->execute(array('email' => $email));
      $account = $req->fetch();
      echo("<script>console.log('PHP: DB PASS = ".$account["password"]."');</script>");
      return $account;
    }

    public static function verify($email,$password) {

      echo("<script>console.log('PHP: get instance');</script>");

      $hostname = "sql2.njit.edu";
      $username = "vs566" ;
      $dbpass = "a6EbTRH7" ;
      $db = new PDO("mysql:host=$hostname;dbname=$username",$username, $dbpass);

      $req = $db->prepare('SELECT * FROM accounts WHERE email = :email');
      $req->execute(array('email' => $email));
      $account = $req->fetch();

      if ($account["password"] == $password) {
        return true;
      }
      else{
        return false;
      }
    }
  }
?>
