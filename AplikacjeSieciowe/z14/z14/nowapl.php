<?php 
	session_start();
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska14"; $dbpassword="1qaz@WSX"; $dbname="db-14";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	mysqli_query($link, "SET NAMES 'utf8'");				
	if(!$link){ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	} 
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
		<form action="nowa.php" name="nowa" method="post">
			Nazwa playlisty:<br>
			<input type="text" name="nazwapl"><br><br>
			Wybierz piosenkę do dodania:<br>
			<select name="song" id="song">
				<?php $results = mysqli_query($link, "SELECT * FROM `song`") or die ("DB error: $dbname playlistadodaj");		
				while($wiersz = mysqli_fetch_array($results)){
					print '<option value="'.$wiersz[0].'">'.$wiersz[2] .' - '.  $wiersz[1].'</option>';
				}
				?>
			</select><br><br>
			Czy playlista ma być publiczna?
			<input type="radio" name="public" value="0">Nie
			<input type="radio" name="public" value="1">Tak
			<br><br>
			<input type="submit" value="Utwórz/dodaj">
		</form>
		<br><br>
		<a href="strona.php">Powrót do strony głównej</a>
	</body>
</html>