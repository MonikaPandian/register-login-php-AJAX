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
$row = $result->num_rows;

echo  $row;

$conn->close();
 
?>


