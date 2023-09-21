<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
	<?php
		session_start();
		
		$idpl = $_POST['play'];

		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska14"; $dbpassword="1qaz@WSX"; $dbname="db-14";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
		mysqli_query($link, "SET NAMES 'utf8'");				
		if(!$link){ 
			echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
		} 
//////////////////////////////////////////JESLI ZALOGOWANO		
		if($_SESSION['nazwisko']){
			$login = $_SESSION['nazwisko'];
			$result = mysqli_query($link, "SELECT * FROM `user` WHERE `login`='$login'");
			$rekord = mysqli_fetch_array($result);
			$idu = $rekord['idu'];
			echo "Jesteś zalogowany/a jako $login.";
			echo '<form action="wyloguj.php" name="wyloguj">
					<input type="submit" value="Wyloguj">
				</form>';
		}?><br><?php
		
		$resultp = mysqli_query($link, "SELECT * FROM `playlistname` WHERE `idpl`='$idpl'");
		$rekordp = mysqli_fetch_array($resultp);
		$name = $rekordp['name'];
	
		echo "Wszystkie utwory z playlisty $name:";
		$result1 = mysqli_query($link, "SELECT * FROM `playlistdatabase` WHERE `idpl`='$idpl'")or die ("DB error: $dbname strona.php listuj song");
			
		print "<TABLE CELLPADDING=5 BORDER=1>";
		print "<TR><TD>Tytuł</TD><TD>Wykonawca</TD><TD>Gatunek</TD><TD>Odtwórz</TD></TR>\n";
		while ($row = mysqli_fetch_array ($result1)){
			$ids = $row[2];								
			$result2 = mysqli_query($link, "SELECT * FROM `song` WHERE `ids`='$ids'") or die ("DB error: wewnetrzne szukanie piosenek");
				while ($row = mysqli_fetch_array ($result2)){
					$title = $row[1];
					$musician = $row[2];
					$filename = $row[5];				
					$musictype = $row[7];	
					
					if($musictype == 1){$musictype = "pop";}if($musictype == 2){$musictype = "rock";}if($musictype == 3){$musictype = "hip-hop";}if($musictype == 4){$musictype = "electronic dance";}if($musictype == 5){$musictype = "R&B";}if($musictype == 6){$musictype = "latin";}if($musictype == 7){$musictype = "country";}if($musictype == 8){$musictype = "metal";}if($musictype == 9){$musictype = "jazz";}if($musictype == 10){$musictype = "classical";}if($musictype == 11){$musictype = "other/undefined";}
					
					$odtwarzacz = "<audio autostart='false' controls='' controlsList='nodownload' oncontextmenu='return false;' src='".$filename."' width='200' height='50'>
									<a href='".$filename."'>Pobierz plik</a>
									</audio>";
					
					print "<TR style='width:auto;'><TD>$title</TD><TD style='width:auto;'>$musician</TD><TD style='width:auto;'>$musictype</TD><TD style='width:auto'>$odtwarzacz</TD></TR>\n";
				}
			}			
			print "</TABLE>";
		?>
		<br><br><a href="strona.php">Powrót do strony głównej</a>
	</body>
</html>