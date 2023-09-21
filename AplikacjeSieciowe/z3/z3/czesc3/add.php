<?php
	$time = date('H:i:s', time());
	$user = $_POST['user'];
	$post = $_POST['post'];
	if (IsSet($_POST['post']))
	{
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska3"; $dbpassword="1qaz@WSX"; $dbname="db-3";
		$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		if (!$connection)
		{
			echo " MySQL Connection error." . PHP_EOL;
			echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		$result = mysqli_query($connection, "INSERT INTO messages (message, user) VALUES ('$post', '$user');") or die ("DB error: $dbname");
		mysqli_close($connection);
	}
	header ('Location: index.php'); // aby ponownie załadować plik index.php, po wykonaniu pliku add.php
?>

<html>
<head>
<title>Bagniewska</title>
</head>
</html>