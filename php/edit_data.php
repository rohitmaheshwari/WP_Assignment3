<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passwordManagement";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id =   $_POST['id'];  
$title = $_POST['title'];
$uname = $_POST['username'];
$pass = $_POST['password'];
$pass= hash('sha512',$pass);
$url = $_POST['url'];

$sql = "UPDATE  `passwords` SET 
                    `title` = '$title',
                    `username` = '$uname',
                    `password`='$pass',
                    `URL` = '$url' 
                    where  `id`= '$id'";

if ($conn->query($sql) === TRUE) {
    header("Refresh:0; url=../password-list.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
