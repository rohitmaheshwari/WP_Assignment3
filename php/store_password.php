<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passwordManagement";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    
$title = $_POST['title'];
$uname = $_POST['username'];
$pass = $_POST['password'];
$pass= hash('sha512',$pass);
$url = $_POST['url'];

$sql = "INSERT INTO  `passwords` (`title`, `username`, `password`, `URL`) VALUES ('$title','$uname','$pass','$url')";

if ($conn->query($sql) === TRUE) {
    header("Refresh:0; url=../password-list.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
