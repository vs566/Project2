<?php
  class Db {
    private static $instance = null;
    private $connection = null;
    private $hostname = "sql2.njit.edu";
    private $dbname = "vs566" ;
    private $username = "vs566" ;
    private $dbpass = "a6EbTRH7" ;


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
      $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username, $this->dbpass);
      $this->connection = isset($conn) ? $conn : null;
    }

    public function fetchAll($sql)
    {
      $list=[];
      if(isset($this->connection))
      {
        $req = $this->connection->query($sql);
        foreach($req->fetchAll() as $item) {
          $list[] = $item;
        }
      }
      return $list;
    }

    public function fetch($sql)
    {
      if(isset($this->connection))
      {
        $req = $this->connection->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
      }
    }

    public function execute($sql)
    {
      if(isset($this->connection))
      {
        return $this->connection->query($sql);
      }
    }

  }
?>
