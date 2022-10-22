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

$email  = $_GET['email'];
$password  = $_GET['password'];

$sql = "select  * from registration where email = ? and password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$rowcount = $result->num_rows;
if($rowcount != 0){
     //echo implode(",",  $result -> fetch_all()[0]);
     $row = $result -> fetch_assoc();
     echo "email=".$row["email"]."&firstname=".$row['firstname']."&lastname=".$row['lastname'];
}else{
     echo $rowcount;
}

$conn->close();
 
?>


