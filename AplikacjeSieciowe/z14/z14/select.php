<?php 
	session_start();
	$idu = $_SESSION['idu'];
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska14"; $dbpassword="1qaz@WSX"; $dbname="db-14";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	$_SESSION = $idu;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Bagniewska</title>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	</head>
	<body> 
		<form action="upload.php" method="post" enctype="multipart/form-data"> 
			Wybierz plik do przesłania: <br>
			<input type="file" name="fileToUpload" id="fileToUpload"> <br>
			Podaj tytuł utworu:
			<input type="text" name="title" id="title" required><br>
			Podaj wykonawcę utworu: 
			<input type="text" name="musician" id="musician" required><br>
			Podaj słowa do piosenki: 
			<input type="text" name="lyrics" id="lyrics" style="width: 200px; height: 100px;"><br>
			Wybierz gatunek muzyczny: 
			<select name="idmt" id="idmt"><?php
				$resultmt = mysqli_query($link, "SELECT * FROM `musictype`")or die ("DB error: $dbname select.php");		
				while($wiersz = mysqli_fetch_array($resultmt)){
					print '<option value="'.$wiersz[0].'">'.$wiersz[1].'</option>';
				}
				?>
			</select>
			<br>
			
			<input type="submit" value="Prześlij" name="submit"/> 
		</form> 
		<a href="strona.php">Powrót do strony głównej</a>
	</body> 
</html>