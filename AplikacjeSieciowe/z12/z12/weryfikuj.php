<?php
	session_start();
	if (!$_SESSION['loggedin']){
		header('Location: index.php');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Bagniewska</title>
	</HEAD>
	<BODY>
		<?php
			$nazwisko = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8");             
			$haslo = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8");   
			$kto = $_POST['kto'];
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);			
			if(!$link){ 
				echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
			}        
			
			mysqli_query($link, "SET NAMES 'utf8'");    
			$result = mysqli_query($link, "SELECT * FROM `$kto` WHERE `login`='$nazwisko'"); 
			$rekord = mysqli_fetch_array($result);
			
			if(!$rekord){
				mysqli_close($link);
				echo "Brak użytkownika o takim loginie !";
			}else{                               
				if($rekord['password']==$haslo){    				
					echo "Logowanie Ok. User: {$rekord['login']}.";	
					echo "jesteś $kto";				
					$_SESSION ['loggedin'] = true;
					$_SESSION['nazwisko'] = $nazwisko;
					$_SESSION['kto'] = $kto;					
					header('Location: strona.php');
				}else{
					mysqli_close($link);
					echo "Błąd!";
					header('Location: index.php');
				}
			}
		?>
	</BODY>
</HTML>
