<?php
class User {
    private $connection;
    private $fname;
    private $lname;
    private $phone;
    private $birthday;
    private $gender;
    private $email;
    private $password;

    public function __construct($fname, $lname, $phone, $birthday, $gender, $email, $password) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;
        $this->connect();
    }

    public function connect() {
        $this->connection = mysqli_connect("sql2.njit.edu", "vs566" , "a6EbTRH7","vs566");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        }

  public function display(){
        $results = mysqli_query($this->connection, "SELECT * FROM accounts where email='$this->email'");
        if(count($results) > 0){
            echo "<table border=\"1\"><tr><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Email</th><th>Password</th></tr>";
            foreach ($results as $row) {
        echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
            }
        }
        else
        {
            echo '0 results';
        }

        echo "<br><br><br>";
         }

    public function displayAll(){
        $results = mysqli_query($this->connection, "SELECT * FROM accounts");
        if(count($results) > 0){
            echo "<table border=\"1\"><tr><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Email</th><th>Password</th></tr>";
            foreach ($results as $row) {
        echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
            }
        }
        else
        {
            echo '0 results';
        }

        echo "<br>";
         }

    public function insert() {
    $sql = "INSERT into accounts (fname, lname, phone, birthday, gender, email, password) values ('$this->fname', '$this->lname', '$this->phone', '$this->birthday', '$this->gender', '$this->email', '$this->password')" ;
    $results = mysqli_query($this->connection,$sql);
    }

    public function delete() {
    $sql = "DELETE FROM accounts WHERE email='$this->email'" ;
    $results = mysqli_query($this->connection,$sql);
    }

    public function update() {
    $sql = "UPDATE accounts SET password = '123case' WHERE email='$this->email' AND fname= '$this->fname' AND lname= '$this->lname' AND phone= '$this->phone' AND birthday= '$this->birthday' AND gender= '$this->gender' AND email= '$this->email' AND password= '$this->password'";
    $results = mysqli_query($this->connection,$sql);
    }


    }


$newObj = new User('Tom', 'Johnson', '18004444123','12/12/01', 'male', 'tjohnson@test.com', '43567');

echo "<p> Original Table </p>";

$newObj->displayAll();
$newObj->insert();
$newObj->display();

echo "<p> Result of Insert function </p>";

$newObj->delete();
$newObj->display();

echo "<p> Result of Delete function </p>";

$newObj->insert();
$newObj->display();

echo "<p> Result of Another Insert </p>";

$newObj->update();
$newObj->display();

echo "<p> Result of Update function </p>";


?>
