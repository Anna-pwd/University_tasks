<?php
	session_start();
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	
	$id = $_SESSION['id'];
	$title = $_POST['title'];
	$tresc = $_POST['tresc'];
	$autor = $_SESSION['nazwisko'];
	$grafika = $_SESSION['grafika'];
	
	$result = mysqli_query($link, "UPDATE `lekcje` SET `title` = '$title' WHERE `id` = '$id'");
	$result2 = mysqli_query($link, "UPDATE `lekcje` SET `tresc` = '$tresc' WHERE `id` = '$id'");
	
	header('Location: stronaszkoleniowiec.php');	
?>