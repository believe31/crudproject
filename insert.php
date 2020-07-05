<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
  die('Could not connect: ' . mysqli_connect_error());
}
$option = $_POST['option'];
$type = $_POST['type'];
$name = $_POST['name'];
$result = mysqli_query($conn, $check);

$sql = "INSERT INTO option (option, type, name) VALUES ('$option','$type','$name')";
if (mysqli_query($conn, $sql)) {
  Header('Location: read.php');
} else {
  echo "Could not insert record: " . mysqli_error($conn);
}
Header('Location: read.php');
mysqli_close($conn);
