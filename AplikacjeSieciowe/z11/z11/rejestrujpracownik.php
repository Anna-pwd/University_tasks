<?php
	session_start();

	if (isset($_SESSION['loggedin'])){
		header('Location: strona.php');
	}
	
	$login = $_POST['user'];
	$haslo = $_POST['pass'];
	$haslo2 = $_POST['pass2'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie){ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
	
	$result = mysqli_query($polaczenie, "SELECT * FROM `pracownik` WHERE `login`='$login'");
	$ile = mysqli_num_rows($result);
	
	if ($ile>0){
		echo "Podany login znajduje się już w bazie. Spróbuj ponownie.";
	}else{
		if($haslo!=$haslo2){
			echo "Wprowadzane hasła są różne. Spóbuj ponownie.";
		}else{
			mysqli_query($polaczenie, "INSERT INTO `pracownik` (`login`, `password`) VALUES ('$login', '$haslo')") or die ("Błąd zapytania do bazy result: $dbname");			
			header('Location: index.php');
		}
	}
	
?>