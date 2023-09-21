<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
	<?php
		session_start();
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
			echo '<a href="select.php">Dodaj nową piosenkę</a><br>';
			?>
			<br>
			<a href="nowapl.php">Utwórz nową playlistę lub uzupełnij już istniejącą</a><br><br>
			
			Twoje playlisty: <br>
			<form action="playlista.php" name="lista" method="post">
				<select name="play" id="play">
				<?php $results = mysqli_query($link, "SELECT * FROM `playlistname` WHERE `idu`='$idu'") or die ("DB error: $dbname playlist");		
					while($wiersz = mysqli_fetch_array($results)){
						print '<option value="'.$wiersz[0].'">'.$wiersz[2].'</option>';
					}
				?>
				</select><br><br>
				<input type="submit" value="Zobacz playlistę">
			</form>
			<?php
			$_SESSION['login'] = $login;
			$_SESSION['idu'] = $idu;
		
		}else{
			echo '<form action="wyloguj.php" name="wyloguj">
				<input type="submit" value="Wróć do strony logowania">
			</form>';
		}
		
//////////////////////////////////////////////////////Dla wszystkich
		?>
		Playlisty publiczne<br>
		<form action="playlista.php" name="lista" method="post">
			<select name="play" id="play">
				<?php $results = mysqli_query($link, "SELECT * FROM `playlistname` WHERE `public`='1'") or die ("DB error: $dbname playlist");		
				while($wiersz = mysqli_fetch_array($results)){
					print '<option value="'.$wiersz[0].'">'.$wiersz[2].'</option>';
				}
				?>
			</select><br><br>
			<input type="submit" value="Zobacz playlistę">
		</form>				
		<br><?php
		print 'Wszystkie utwory';
		$result1 = mysqli_query($link, "SELECT * FROM `song`")or die ("DB error: $dbname strona.php listuj song");
		print "<TABLE CELLPADDING=5 BORDER=1>";
		print "<TR><TD>Tytuł</TD><TD>Wykonawca</TD><TD>Gatunek</TD><TD>Odtwórz</TD></TR>\n";
		while ($row = mysqli_fetch_array ($result1)){
			$title = $row[1];
			$musician = $row[2];
			$filename = $row[5];				
			$musictype = $row[7];				
				
			if($musictype == 1){$musictype = "pop";}if($musictype == 2){$musictype = "rock";}if($musictype == 3){$musictype = "hip-hop";}if($musictype == 4){$musictype = "electronic dance";}if($musictype == 5){$musictype = "R&B";}if($musictype == 6){$musictype = "latin";}if($musictype == 7){$musictype = "country";}if($musictype == 8){$musictype = "metal";}if($musictype == 9){$musictype = "jazz";}if($musictype == 10){$musictype = "classical";}if($musictype == 11){$musictype = "other/undefined";}
				
			$odtwarzacz = "<audio autostart='false' controls='' controlsList='nodownload' oncontextmenu='return false;' src='".$filename."' width='200' height='50'><a href='".$filename."'>Pobierz plik</a>
						</audio>";
				
			print "<TR style='width:auto;'><TD>$title</TD><TD style='width:auto;'>$musician</TD><TD style='width:auto;'>$musictype</TD><TD style='width:auto'>$odtwarzacz</TD></TR>\n";
		}
		print "</TABLE>";
	?>
	</body>
</html>
		