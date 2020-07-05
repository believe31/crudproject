<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
  die('Could not connect: ' . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "DELETE FROM option WHERE id = $id";
if (mysqli_query($conn, $sql)) {
  Header('Location: read.php');
} else {
  echo "Could not delete record: " . mysqli_error($conn);
}
mysqli_close($conn);
