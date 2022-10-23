<?php
header('Access-Control-Allow-Origin: *');
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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $fname  = $_POST['first_name'];
  $lname  = $_POST['last_name'];
  $email  = $_POST['email'];
  $password  = $_POST['password'];
 
    if(!$fname || !$lname || !$email || !$password){
       $result = 2;
    } elseif (!strpos($email, "@") || !strpos($email, ".")) {
        $result = 3;
    }else {
      $sql    = "insert into registration (firstname, lastname, email, password) values (?, ?, ?, ?) ";
      $stmt   = $conn->prepare($sql);
      $stmt->bind_param('ssss', $fname, $lname, $email, $password);
      $result = $stmt->execute(); 
    }
    echo $result;

  }else{
    $email  = $_GET['email'];

    $sql = "select  * from registration where email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->num_rows;

    echo  $row;
 }

  $conn->close(); 
?>


