<?php
	session_start();
	
	if (!$_SESSION['loggedin']){
		header('Location: index.php');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title>Bagniewska</title>
	</head>

	<body>
		Jesteś zalogowany jako: 
		<?php
			echo $_SESSION['nazwisko'];
			$idk = $_SESSION['idklienta'];
		?>
		
		<br><br>
		<a href ="formularzklient.php">Zadaj pytanie tutaj </a> lub  <br><br>
		<form method="POST" action="wyloguj.php">
			<input type="submit" value="Wyloguj"/>
		</form>
		
		<?php
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";
			$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			if (!$connection){
				echo " MySQL Connection error." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			$result = mysqli_query($connection, "Select * from `posty` WHERE (`idk`='$idk' AND `idp`!='0')") or die ("DB-Error: $dbname");
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>Numer</TD><TD>Pytanie</TD><TD>Odpowiedź</TD><TD>Nazwisko</TD><TD>Ocena</TD></TR>\n";
			while ($row = mysqli_fetch_array ($result)){
				$idr = $row[0];
				$idp = $rekord['idp'];
				$pytanie = $row[5];
				$odpowiedz = $row[6];
				$ocena = $row[7];	
				
				if ($idp = 1){
					$nazwisko = 'pracownik1';
				}else{
					$nazwisko = 'pracownik2';
				}
					
				print "<TR><TD>$idr</TD><TD>$pytanie</TD><TD>$odpowiedz</TD><TD>$nazwisko</TD><TD>$ocena</TD></TR>\n";
			
			}
			print "</TABLE>";
			Echo "<br><br>Oceń odpowiedź na wybrane pytanie:<br>";
		?>
		
		<form method="post" action="ocena.php">
			Numer rozmowy: <input type="number" name="idr" required><br>
			Ocena: <select name="ocena" id="ocena">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5" selected>5</option>
					</select><br>
			<input type="submit" value="Oceń">
		</form>
	</body>
</html>