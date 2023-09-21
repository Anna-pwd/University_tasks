<?php
	session_start();
	
	if (!$_SESSION['loggedin']){
		header('Location: index.php');
	}
	
	$idr = $_POST['idr'];
	$ocena = $_POST['ocena'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie){ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
	
	$sprawdz = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE (`idr`='$idr' AND `ocena`='')") or die ("Error");
	if(!$sprawdz){
		header('Location: stronaklient.php');
	}else{
		mysqli_query($polaczenie, "UPDATE `posty` SET `ocena`='$ocena' WHERE (`idr`='$idr' AND `ocena` IS NULL)");
	}
	header('Location: stronaklient.php');
?>