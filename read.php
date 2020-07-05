<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project';

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
	die('Could not connect: ' . mysqli_connect_error());
}

$filter = '';
if (isset($_GET['option']) && !empty($_GET['option'])) {
	$filter .= ' AND option = "' . $_GET['option'] . '"';
}
if (isset($_GET['type']) && !empty($_GET['type'])) {
	$filter .= ' AND type = "' . $_GET['type'] . '"';
}
if (isset($_GET['name']) && !empty($_GET['name'])) {
	$filter .= ' AND name = "' . $_GET['name'] . '"';
}

$query = "SELECT * FROM option WHERE 1" . $filter;

$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Option Administration Page</title>
</head>

<body>
	<h2>Option Administration Page</h2>
	<a href="insert_view.php">Add New</a><br><br>
	<form action="read.php" method="get">
		Option#: <input type="text" name="option" value="<?php echo isset($_GET['option']) ? $_GET['option'] : '' ?>">
		Type: <input type="text" name="type" value="<?php echo isset($_GET['type']) ? $_GET['type'] : '' ?>">
		Name <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>">
		<input type="submit" value="Submit">
		<br><br>
	</form>
	<table border="1">
		<tr>
			<th>Option#</th>
			<th>Type</th>
			<th>Name</th>
			<th>edit</th>
			<th>delete</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($result)) : ?>
			<tr>
				<td><?php echo $row['option']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><a href="upadate_view.php?id=<?php echo ($row['id']) ?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo ($row['id']) ?>">Delete</a></td>
			</tr>
		<?php endwhile; ?>
	</table>
</body>

</html>