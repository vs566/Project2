
<?php
  class Account
  {
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;

    public function __construct($id, $email, $fname,$lname,$phone,$birthday,$gender,$password)
    {
      $this->id      = $id;
      $this->email  = $email;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->phone = $phone;
      $this->birthday = $birthday;
      $this->gender = $gender;
      $this->password = $password;
    }

    public static function getAccount($email)
    {
      $db = Db::getInstance();
      $sql = "SELECT * FROM accounts WHERE email = '".$email."'";
      $account = $db->fetch($sql);
      return $account;
    }

    public static function newAccount($email,$fname,$lname,$phone,$birthday,$gender,$password)
    {
      $db = Db::getInstance();
      $sql = "INSERT INTO accounts(email, fname, lname, phone, birthday, gender, password) VALUES ('$email','$fname','$lname','$phone','$birthday','$gender','$password')";
      $db->execute($sql);
    }
  }
?>
