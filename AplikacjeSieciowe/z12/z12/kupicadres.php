<?php
	session_start();
	
	$ido = $_POST['ido'];
	$idk = $_POST['idk'];

	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "SET NAMES 'utf8'");		
	mysqli_query($link, "INSERT INTO `transakcje` (`ido`, `idk`) VALUES ('$ido', '$idk')") or die ("DB error: $dbname kupno-tran");	
	header('Location: strona.php');
?>