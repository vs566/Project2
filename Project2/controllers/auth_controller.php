<?php
  class AuthController {
    public function index()
    {
      // Check if user is already logged in.
      $_SESSION['errorMessage']="";
      if(isset($_SESSION['account']) && $_SESSION['account']!=""){
        header("Location: ?controller=todo&action=index");
        exit();
      }
      else
      {
        require_once('views/auth/index.php');
      }
    }

    public function register()
    {
      $errorMessage = $_SESSION['errorMessage'];
      require_once('views/auth/register.php');
    }

    public function login()
    {
      if (isset($_POST["email"]) && isset($_POST['password']))
      {
        $email=$_POST['email'];
        $password=$_POST['password'];
        echo("<script>console.log('PHP: verifying user".$email."');</script>");

        $account = Account::getAccount($email);

        if ($account["password"] == $password) {
          $_SESSION['account']=$account;
          header("Location: ?controller=todo&action=index");
          exit();
        }
        else
        {
          $this->logout();
        }
      }
      else
      {
        header("Location: ?controller=pages&action=error");
        exit();
      }
    }

    public function logout()
    {
      $_SESSION['account']="";
      header("Location: ?controller=auth&action=index");
      exit();
    }

    public function createUser()
    {
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $birthday = $_POST["birthday"];
      $gender = $_POST["gender"];
      $password = $_POST["password"];

      $existingAccount = Account::getAccount($email);


      if($existingAccount == false)
      {
        $_SESSION['errorMessage'] = "";
        Account::newAccount($email,$fname,$lname,$phone,$birthday,$gender,$password);
        header("Location: ?controller=auth&action=index");
        exit();
      }
      else
      {
        //User exists
        $_SESSION['errorMessage'] = "The account already exists.";
        header("Location: ?controller=auth&action=register");
        exit();
      }
    }

  }
?>
