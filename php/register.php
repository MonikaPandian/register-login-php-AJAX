<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "users";

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}

/* Get data from Client side using $_POST array */
$fname  = $_POST['first_name'];
$lname  = $_POST['last_name'];
$email  = $_POST['email'];
$password  = $_POST['password'];

/* validate whether user has entered all values. */
if(!$fname || !$lname || !$email || !$password){
    $result = 2;
  }elseif (!strpos($email, "@") || !strpos($email, ".")) {
    $result = 3;
  }
  else {
     $sql    = "insert into registration (firstname, lastname, email, password) values (?, ?, ?, ?) ";
     $stmt   = $conn->prepare($sql);
     $stmt->bind_param('ssss', $fname, $lname, $email, $password);
     if($stmt->execute()){
       $result = "success";
     }
  }
  $conn->close();
  
?>


