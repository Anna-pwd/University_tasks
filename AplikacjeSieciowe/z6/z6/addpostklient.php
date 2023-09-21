<?php
	session_start();

	if (!isset($_SESSION['loggedin'])){
		header('Location: index.php');
	}
	
	$nazwisko = $_SESSION['nazwisko'];
	$kategoria = $_POST['kategoria'];
	$tresc = $_POST['tresc'];
	$data = date("Y-m-d H:i:s");
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
	
	$result = mysqli_query($polaczenie, "SELECT * FROM `klienci` WHERE `nazwisko`='$nazwisko'");
	$wiersz = mysqli_fetch_array($result);
	$idk = $wiersz[0];  
	
	mysqli_query($polaczenie, "INSERT INTO `posty` (`idk`, `idz`, `datagodzina`, `post_klienta`) 
	VALUES ('$idk', '$kategoria', '$data', '$tresc')");
	
		header('Location: stronaklient.php');
?>