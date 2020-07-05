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
$option = $_POST['option'];
$type = $_POST['type'];
$name = $_POST['name'];
$result = mysqli_query($conn, $check);

$sql = "UPDATE option SET option = '$option', type = '$type', name = '$name' WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    Header('Location: read.php');
} else {
    echo "Could not insert record: " . mysqli_error($conn);
}
mysqli_close($conn);
