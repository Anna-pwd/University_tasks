<?php
	$kowalski = $_POST['kowalski'];
	$nowak = $_POST['nowak'];
	$lee = $_POST['lee'];
	$polak = $_POST['polak'];
	$piasecki = $_POST['piasecki'];

	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska4"; $dbpassword="1qaz@WSX"; $dbname="db-4";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if (!$polaczenie) {
		echo "Błąd połączenia z MySQL." . PHP_EOL;
		echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$r_kowalski = mysqli_query($polaczenie, "UPDATE pracownicy SET obecnosc='$kowalski' WHERE nazwisko='Kowalski'") or die ("Błąd zapytania do bazy air: $dbname");
	$r_nowak = mysqli_query($polaczenie, "UPDATE pracownicy SET obecnosc='$nowak' WHERE nazwisko='Nowak'") or die ("Błąd zapytania do bazy gas: $dbname");
	$r_lee = mysqli_query($polaczenie, "UPDATE pracownicy SET obecnosc='$lee' WHERE nazwisko='Lee'") or die ("Błąd zapytania do bazy break: $dbname");
	$r_kaminski = mysqli_query($polaczenie, "UPDATE pracownicy SET obecnosc='$polak' WHERE nazwisko='Polak'") or die ("Błąd zapytania do bazy fire: $dbname");
	$r_malkowski = mysqli_query($polaczenie, "UPDATE pracownicy SET obecnosc='$piasecki' WHERE nazwisko='Piasecki'") or die ("Błąd zapytania do bazy water: $dbname");
	
	mysqli_close($polaczenie);
	header('Location: index.php');

?>
<html>
	<head>
		<title>Bagniewska</title>
	</head>
</html>