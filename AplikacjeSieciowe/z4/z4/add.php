<?php
	$x1 = $_POST['x1'];
	$x2 = $_POST['x2'];
	$x3 = $_POST['x3'];
	$x4 = $_POST['x4'];
	$x5 = $_POST['x5'];

	$air = $_POST['air'];
	$alertgas = $_POST['alertgas'];
	$breakin = $_POST['breakin'];
	$fire = $_POST['fire'];
	$water = $_POST['water'];

	$dbhost = "mysql01.abagniewska.beep.pl"; $dbuser = "abagniewska4"; $dbpassword = "1qaz@WSX"; $dbname = "db-4";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if (!$polaczenie) {
		echo "Błąd połączenia z MySQL." . PHP_EOL;
		echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	$result = mysqli_query($polaczenie, "INSERT INTO pomiary (x1,x2,x3,x4,x5) VALUES ($x1,$x2,$x3,$x4,$x5)") or die ("Błąd zapytania do bazy result: $dbname");
	$result_air = mysqli_query($polaczenie, "UPDATE wskazniki SET stan='$air' WHERE nazwa='air'") or die ("Błąd zapytania do bazy air: $dbname");
	$result_alertgas = mysqli_query($polaczenie, "UPDATE wskazniki SET stan='$alertgas' WHERE nazwa='alertgas'") or die ("Błąd zapytania do bazy gas: $dbname");
	$result_breakin = mysqli_query($polaczenie, "UPDATE wskazniki SET stan='$breakin' WHERE nazwa='breakin'") or die ("Błąd zapytania do bazy break: $dbname");
	$result_fire = mysqli_query($polaczenie, "UPDATE wskazniki SET stan='$fire' WHERE nazwa='fire'") or die ("Błąd zapytania do bazy fire: $dbname");
	$result_water = mysqli_query($polaczenie, "UPDATE wskazniki SET stan='$water' WHERE nazwa='water'") or die ("Błąd zapytania do bazy water: $dbname");
	
	mysqli_close($polaczenie);
	header('Location: index.php');

?>
<html>
	<head>
		<title>Bagniewska</title>
	</head>
</html>