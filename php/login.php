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
$email  = $_POST['email'];
$password  = $_POST['password'];

/* validate whether user has entered all values. */
if(!$email || !$password){
    $result = 2;
  }elseif (!strpos($email, "@") || !strpos($email, ".")) {
    $result = 3;
  } else {
     //SQL query to get results from database
     $sql    = "select * from registration where email = ? and password = ? ";
     $stmt   = $conn->prepare($sql);
     $stmt->bind_param('ss', $email, $password);
     $stmt->execute();
     $result = $stmt->get_result();
     if($row = $result->fetch_assoc()){
        echo $row;
     }
  }
  $conn->close();
  return $result;
?>


