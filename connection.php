<?php
  class Db {
    private static $instance = NULL;
    private static $hostname = "sql2.njit.edu";
    private static $username = "vs566" ;
    private static $password = "a6EbTRH7" ;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      echo("<script>console.log('PHP: check if DB set');</script>");

      if (!isset(self::$instance)) {
        echo("<script>console.log('PHP: open la conexion');</script>");
        try
        {
          // $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          self::$instance = new PDO("mysql:host=$hostname;dbname=$username",$username, $password, $pdo_options);
        }
        catch(PDOException $e)
        {
          echo("<script>console.log('PHP: ".$e->getMessage()."');</script>");
            // echo "Connection failed: " . $e->getMessage();
            http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
        }
      }
      return self::$instance;
    }

    public static function http_error($message)
    {
        header("Content-type: text/plain");
        die($message);
    }
  }
?>
