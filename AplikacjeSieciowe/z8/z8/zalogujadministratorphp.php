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
	$login = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8");             
	$haslo = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8");             
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska8"; $dbpassword="1qaz@WSX"; $dbname="db-8";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	
	if(!$link) { 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	}        
	mysqli_query($link, "SET NAMES 'utf8'");    
	$result = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='$login'"); 
	$rekord = mysqli_fetch_array($result);
	
	if(!$rekord){
		mysqli_close($link);
		echo "Brak użytkownika o takim loginie!";
	}else{                               
		if($rekord['haslo']==$haslo){                        
			
			$_SESSION ['loggedin'] = true;	
			
			$data = date("Y-m-d H:i:s");
			$ip_addr = $_SERVER["REMOTE_ADDR"];
			
			mysqli_query($link, "INSERT INTO `login_history` (`datetime`, `username`, `ip_address`) VALUES ('$data', '$login', '$ip_addr')") or die ("logi nieudane");
			
			$_SESSION['login'] = $login;
			header('Location: index.php');
		}else{
			mysqli_close($link);
			echo "Błąd w loginie lub haśle!";
			header('Location: index.php');
		}
	}

?>
</BODY>
</HTML>
