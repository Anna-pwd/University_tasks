<?php
	session_start();

	if (!isset($_SESSION['nazwisko'])){
		header('Location: index.php');
	}
	
	$nazwa = $_POST['nazwa'];
	$idp = $_POST['idp'];
	$login = $_SESSION['nazwisko'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";

	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$link) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
			
	mysqli_query($link, "INSERT INTO `zadanie` (`idp`, `nazwa_zadania`) VALUES ('$idp', '$nazwa')");
	header('Location: strona.php');	
?>