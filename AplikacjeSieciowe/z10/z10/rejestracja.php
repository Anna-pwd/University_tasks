<?php
	session_start();

	if($_SESSION['loggedin'] == true){
		header('Location: forum.php');
	}
	
	$login = $_POST['ruser'];
	$haslo = $_POST['rpass'];
	$haslo2 = $_POST['rpass2'];
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";

	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if(!$polaczenie) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
	
	$result = mysqli_query($polaczenie, "SELECT * FROM `users` WHERE `login`='$login'");
	$ile = mysqli_num_rows($result);
	
	if(!preg_match('/^[0-9|a-z|A-Z]{1,20}$/', $_POST['ruser'])){
		echo "Login może składać się tylko z liter alfabetu angielskiego i cyfr";
	}else{
		if ($ile>0){
			echo "Podany login znajduje się już w bazie. Spróbuj ponownie.";
		}else{
			if($haslo!=$haslo2){
				echo "Wprowadzane hasła są różne. Spóbuj ponownie.";
			}else{
				mysqli_query($polaczenie, "INSERT INTO `users` (`login`, `haslo`) VALUES ('$login', '$haslo')") or die ("Błąd zapytania do bazy result: $dbname");
			
				header('Location: index.php');
			}
		}
	}	
?>