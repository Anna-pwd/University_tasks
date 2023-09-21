<?php 
	session_start();
	unset($_SESSION['idt']);
	$userid = $_POST['userid'];
	$usun = $_POST['usun'];

	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	mysqli_query($link, "SET NAMES 'utf8'");   
	
	if($usun == 0){
		mysqli_query($link, "DELETE FROM `users` WHERE `id`='$userid'");
	}
	if($usun == 1){
		mysqli_query($link, "UPDATE `users` SET `ban`='1' WHERE `id`='$userid'");
	}
	if($usun == 2){
		mysqli_query($link, "UPDATE `users` SET `ban`='0' WHERE `id`='$userid'");
	}
	
	header('Location: forum.php');
?>
