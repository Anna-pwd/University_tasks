<?php
	session_start();

	$idp = $_POST['idp'];
	$idt = $_POST['idt'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "SET NAMES 'utf8'");	
	$result2 = mysqli_query($link, "UPDATE `transakcje` SET `zaplacono`='1' WHERE `idt`='$idt'") or die ("error zaplacono");
	$result2 = mysqli_query($link, "UPDATE `transakcje` SET `idp`='$idp' WHERE `idt`='$idt'") or die ("error idp ");
	header('Location: strona.php');