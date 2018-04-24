<?php
  class Db {
    private static $instance = null;
    private $connection = null;
    // private $hostname = "sql2.njit.edu";
    // private $dbname = "vs566" ;
    // private $username = "vs566" ;
    // private $dbpass = "a6EbTRH7" ;

    private $hostname = "localhost";
    private $dbname = "php_mvc" ;
    private $username = "jsoto" ;
    private $dbpass = "luqovRwipL6fimh2" ;

    public static function getInstance()
    {
      if (!self::$instance)
      {
        self::$instance = new self();
      }
      return self::$instance;
    }

    private function __clone() {}

    private function __construct()
    {
      $this->$connection = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username, $this->dbpass);
    }

    public function fetchAll($sql)
    {
      $list=[];
      $req = $this->$connection->query($sql);
      foreach($req->fetchAll() as $item) {
        $list[] = $item;
      }
      return $list;
    }

    public function fetch($sql)
    {
      $req = $this->$connection->prepare($sql);
      $req->execute();
      $result = $req->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function execute($sql)
    {
      return $this->$connection->query($sql);
    }

  }
?>
