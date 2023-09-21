<?php
	session_start();
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	
	$title = $_POST['title'];
	$timeminute = $_POST['timeminute'];
	$autor = $_SESSION['nazwisko'];
	
	$result = mysqli_query($link, "INSERT INTO `test` (`szkoleniowiec`, `nazwa`, `max_time`) VALUES ('$autor', '$title', '$timeminute')");
	
	header('Location: stronaszkoleniowiec.php');
?>