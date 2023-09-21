<?php
	session_start();
	if($_SESSION['loggedin'] == true){
		header('Location: forum.php');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Bagniewska</title>
	</HEAD>
	<BODY>
	<?php
		$login = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8");             
		$haslo = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8");             
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		//$data = date("Y-m-d H:i:s");
		if(!$link){ 
			echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
		}        
		mysqli_query($link, "SET NAMES 'utf8'");    
		$result = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='$login'"); 
		$rekord = mysqli_fetch_array($result);

		
		if(!$rekord){
			mysqli_close($link);
			echo "Brak użytkownika o takim loginie !";
		}else{    
		
			if($rekord['haslo']==$haslo){                      					
				if($rekord['ban']=='0'){						
					$_SESSION ['loggedin'] = true;
					$_SESSION['login'] = $login;
					$_SESSION['ban'] = false;
					header('Location: forum.php');
					
				}else{
					$_SESSION['ban'] = true;
					header('Location: index.php');
				}
						
			}else{
				
				$_SESSION['loggedin'] = false;
				header('Location: index.php');
			}			
			header('Location: index.php');				
		}		
	?>
	</BODY>
</HTML>
