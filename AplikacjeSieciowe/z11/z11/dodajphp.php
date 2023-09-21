<?php
	session_start();

	if (!isset($_SESSION['nazwisko'])){
		header('Location: index.php');
	}
	
	$idp = $_POST['idp'];
	$nazwa = $_POST['nazwa'];
	$idz = $_POST['idz'];
	$login = $_SESSION['nazwisko'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";

	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$link) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
			
	mysqli_query($link, "INSERT INTO `podzadanie` (`idz`, `idm`, `idp`, `nazwa_podzadania`) VALUES ('$idz', '$login', '$idp', '$nazwa')");
	header('Location: strona.php');
?>