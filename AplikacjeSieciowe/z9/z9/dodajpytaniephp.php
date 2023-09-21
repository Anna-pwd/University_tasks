<?php		
	session_start();	
	$idt = $_SESSION['idt'];
	$pytanie = $_POST['pytanie'];
	$odpa = $_POST['odpa'];
	$odpb = $_POST['odpb'];
	$odpc = $_POST['odpc'];
	$odpd = $_POST['odpd'];
	$poprawna = $_POST['odp'];
		
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "INSERT INTO `pytanie` (`idt`, `tresc_pytania`, `odp_a`, `odp_b`, `odp_c`, `odp_d`, poprawna) VALUES ('$idt', '$pytanie', '$odpa', '$odpb', '$odpc', '$odpd', '$poprawna')");	
	$_SESSION['idt'] = $idt;		
	header('Location: dodajpytanie.php');
?>			