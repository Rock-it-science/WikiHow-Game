<?php
//Submit response to database

$response = $_REQUEST["response"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wiki";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO responses (response) VALUES ('$response')";
if($conn->query($sql) === TRUE){
  echo "response added successfully";
  header('Location: success.html');
  redirect();
} else{
  echo "Error" . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
