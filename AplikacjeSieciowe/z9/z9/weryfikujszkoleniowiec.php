<?php
	session_start();
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
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			
			if(!$link){ 
				echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
			}        
			
			mysqli_query($link, "SET NAMES 'utf8'");    
			$result = mysqli_query($link, "SELECT * FROM `szkoleniowcy` WHERE `login`='$nazwisko'"); 
			$rekord = mysqli_fetch_array($result);
			
			if(!$rekord){
				mysqli_close($link);
				echo "Brak użytkownika o takim loginie !";
			}else{                               
				if($rekord['haslo']==$haslo){                        
					echo "Logowanie Ok. User: {$rekord['login']}.";
					
					$_SESSION ['loggedin'] = true;
					$_SESSION['nazwisko'] = $nazwisko;
					$ids = $rekord['ids'];
					
					$_SESSION['idklienta'] = $idk;
					
					if ($nazwisko != 'admin'){
						header('Location: stronaszkoleniowiec.php');
					}else{
						header('Location: stronaadmin.php');
					}
					
				}else{
					mysqli_close($link);
					echo "Błąd!";
					header('Location: index.php');
				}
			}
		?>
	</BODY>
</HTML>
