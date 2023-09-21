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
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			
			if(!$link){ 
				echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
			}        
			
			mysqli_query($link, "SET NAMES 'utf8'");    
			$result = mysqli_query($link, "SELECT * FROM `klienci` WHERE `nazwisko`='$nazwisko'"); 
			$rekord = mysqli_fetch_array($result);
			
			if(!$rekord){
				mysqli_close($link);
				echo "Brak użytkownika o takim loginie !";
			}else{                               
				if($rekord['haslo']==$haslo){                        
					echo "Logowanie Ok. User: {$rekord['nazwisko']}. Hasło: {$rekord['haslo']}";
					
					$_SESSION ['loggedin'] = true;
					$_SESSION['nazwisko'] = $nazwisko;
					$idk = $rekord['idk'];
					$ipaddress = $_SERVER["REMOTE_ADDR"];
					$data = date("Y-m-d H:i:s");
					$_SESSION['idklienta'] = $idk;
					
					$agent = "X".$_SERVER['HTTP_USER_AGENT'];
					$system = array('Windows 2000' => 'NT 5.0', 'Windows XP' => 'NT 5.1','Windows Vista' => 'NT 6.0', 'Windows 7' => 'NT 6.1',
					'Windows 8' => 'NT 6.2', 'Windows 8.1' => 'NT 6.3', 'Windows 10' => 'NT 10', 'Linux' => 'Linux', 'iPhone' => 'iphone' , 'Android' => 'android');
			
					$przegladarka = array('Internet Explorer' => 'MSIE', 'Mozilla Firefox' => 'Firefox','Opera' => 'Opera', 'Chrome' => 'Chrome', 'Edge' => 'Edge');
			
					foreach ($system as $nazwa => $id)
						if (strpos($agent, $id)) $system = $nazwa;
			
					foreach ($przegladarka as $nazwa => $id)
						if (strpos($agent, $id)) $przegladarka = $nazwa;
						
					$_SESSION['browser'] = $przegladarka;
					$_SESSION['serwer'] = $system;
					
					
					mysqli_query($link, "INSERT INTO `logi_klientow` (`idk`, `datagodzina`, `ip_address`, `przegladarka`, `system`) VALUES ('$idk', '$data', '$ipaddress', '$przegladarka', '$system')");
					header('Location: stronaklient.php');
					
				}else{
					mysqli_close($link);
					echo "Błąd!";
					header('Location: index.php');
				}
			}
		?>
	</BODY>
</HTML>
