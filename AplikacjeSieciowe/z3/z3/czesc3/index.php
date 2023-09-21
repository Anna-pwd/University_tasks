<form method="POST" action="add.php"><br>
	Nick:<input type="text" name="user" maxlength="10" size="10"><br>
	Post:<input type="text" name="post" maxlength="90" size="90"><br>
	<input type="submit" value="Send"/>
</form>

<?php $dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska3"; $dbpassword="1qaz@WSX"; $dbname="db-3";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if (!$connection)
	{
		echo " MySQL Connection error." . PHP_EOL;
		echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	$result = mysqli_query($connection, "Select * from messages ORDER BY idk DESC") or die ("DB error: $dbname");
	print "<TABLE CELLPADDING=5 BORDER=1>";
	print "<TR><TD>id</TD><TD>Date/Time</TD><TD>User</TD><TD>Message</TD></TR>\n";
	while ($row = mysqli_fetch_array ($result))
	{
		$id = $row[0];
		$date = $row[1];
		$message= $row[2];
		$user = $row[3];
		print "<TR><TD>$id</TD><TD>$date</TD><TD>$user</TD><TD>$message</TD></TR>\n";
	}
	print "</TABLE>";
	mysqli_close($connection);
?>

<html>
<head>
<title>Bagniewska</title>
</head>
</html>