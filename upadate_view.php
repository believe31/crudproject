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
$query = "SELECT * FROM `option` WHERE id = '$id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Option</title>
</head>

<body>

    <h2>Update Option</h2>
    <form method="post" action="update.php?id=<?php echo ($row['id']); ?>">
        Option#: <input type="text" name="option" value="<?php echo $row['option'] ?>"></br></br>
        Type: <input type="text" name="type" value="<?php echo $row['type'] ?>"></br></br>
        Name: <input type="text" name="name" value="<?php echo $row['name'] ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>