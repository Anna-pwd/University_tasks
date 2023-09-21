<?php
	session_start();

	if (!isset($_SESSION['loggedin'])){
		header('Location: index.php');
	}
	
	$idr = $_POST['idr'];
	$post_pracownika = $_POST['post_pracownika'];
	$idp = $_SESSION['idpracownika'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 

	mysqli_query($polaczenie, "UPDATE `posty` SET `idp`='$idp' WHERE `idr`='$idr'");
	mysqli_query($polaczenie, "UPDATE `posty` SET `post_pracownika`='$post_pracownika' WHERE `idr`='$idr'");
	
	header('Location: stronapracownik.php');
	?>