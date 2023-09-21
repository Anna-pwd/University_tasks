<?php
	session_start();

	$idp = $_POST['idp'];
	$ido = $_POST['ido'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "SET NAMES 'utf8'");	
	$result2 = mysqli_query($link, "UPDATE `oferty` SET `idp`='$idp' WHERE `ido`='$ido'") or die ("error potwierdzanie oferty");
	header('Location: strona.php');