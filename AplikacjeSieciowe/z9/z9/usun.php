<?php 
	session_start();
	if (!isset($_SESSION['loggedin'])){
		header('Location: index.php');
	}
		
	$title = $_POST['title'];
		
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "DELETE FROM `lekcje` WHERE `title`='$title'");
	header('Location: stronaszkoleniowiec.php');
?>