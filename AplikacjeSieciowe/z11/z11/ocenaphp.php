<?php
	session_start();

	if (!isset($_SESSION['nazwisko'])){
		header('Location: index.php');
	}
	
	$suwak = $_POST['suwak'];
	$idpz = $_POST['idpz'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$link) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
			
	mysqli_query($link, "UPDATE `podzadanie` SET `stan`='$suwak' WHERE `idpz`='$idpz'");
	header('Location: strona.php');	
?>