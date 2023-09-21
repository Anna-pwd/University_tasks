<?php
	session_start();

	if (isset($_SESSION['loggedin'])){
		header('Location: stronaklient.php');
	}
		if (!$_SESSION['loggedin']){
		header('Location: index.php');
	}
	
	$nazwisko = $_POST['nazwisko'];
	$haslo = $_POST['haslo'];
	$haslo2 = $_POST['haslo2'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
	
	$result = mysqli_query($polaczenie, "SELECT `idp` FROM `klienci` WHERE `nazwisko`='$nazwisko'");

	$ile = mysqli_num_rows($result);
	if ($ile>0){
		echo "Podane nazwisko znajduje się już w bazie. Spróbuj ponownie.";
	}else{
		if($haslo!=$haslo2){
			echo "Wprowadzane hasła są różne. Spóbuj ponownie.";
		}else{
			mysqli_query($polaczenie, "INSERT INTO `klienci` (`nazwisko`, `haslo`) VALUES ('$nazwisko', '$haslo')") or die ("Błąd zapytania do bazy result: $dbname");
			header('Location: index.php');
		}
	}	
	?>