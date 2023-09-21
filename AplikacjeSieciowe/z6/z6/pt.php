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
		?>
		<br><br>
		
		<form method="POST" action="wyloguj.php">
			<input type="submit" value="Wyloguj"/>
		</form>
		<form method="POST" action="dodajodp.php"><br><br>
			ID pytania: <input type="text" name="idr" required><br>
			Odpowiedź na pytanie: <input type="text" name="post_pracownika" size="100" required><br>
			<input type="submit" value="Wyślij">
		</form>
		<a href="stronapracownik.php">Powrót do strony głównej</a>
		
		<?php
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";
			$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			if (!$connection){
				echo " MySQL Connection error." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			$result = mysqli_query($connection, "Select * from `posty` WHERE (`idz`='2' AND `idp`='0')") or die ("DB-Error: $dbname");
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>idr</TD><TD>Date/Time</TD><TD>Message</TD></TR>\n";
			while ($row = mysqli_fetch_array ($result)){
				$idr = $row[0];
				$date = $row[4];
				$message= $row[5];
				
				print "<TR><TD>$idr</TD><TD>$date</TD><TD>$message</TD></TR>\n";
			}
			print "</TABLE>";
		?>
	</body>
</html>