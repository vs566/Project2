<?php
  class AuthController {
    public function index() {
      require_once('views/auth/index.php');
    }

    public function login() {
      if (isset($_POST["email"]) && isset($_POST['password'])) {

        $email=$_POST['email'];
        $password=$_POST['password'];
        echo("<script>console.log('PHP: verifying user".$email."');</script>");

        $account = Account::getAccount($email);
        if ($account["password"] == $password) {
          $_SESSION['account']=$account;
          echo("<script>console.log('PHP: redirect');</script>");
          return call('todo', 'index');
        }
        else
        {
          $_SESSION['account']="";
          return call('auth', 'index');
        }
      }
      else
      {
        return call('pages', 'error');
      }
    }

  }
?>
