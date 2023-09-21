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
		
		<?php
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska6"; $dbpassword="1qaz@WSX"; $dbname="db-6";

			$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			if(!$polaczenie) { 
				echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
			} 
			
			$result1 = mysqli_query($polaczenie, "SELECT * FROM `posty`");
			$ile1 = mysqli_num_rows($result1);
			
			$result2 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE `idp` != '0'");
			$ile2 = mysqli_num_rows($result2);
			
			$result31 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE `idp` = '1'");
			$ile31 = mysqli_num_rows($result31);
			$result32 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE `idp` = '2'");
			$ile32 = mysqli_num_rows($result32);
			
			$result41 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE (`idz` = '1' AND `idp` != '0')");
			$ile41 = mysqli_num_rows($result41);
			$result42 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE (`idz` = '2' AND `idp` != '0')");
			$ile42 = mysqli_num_rows($result42);
			$result43 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE (`idz` = '3' AND `idp` != '0')");
			$ile43 = mysqli_num_rows($result43);
			$result44 = mysqli_query($polaczenie, "SELECT * FROM `posty` WHERE (`idz` = '4' AND `idp` != '0')");
			$ile44 = mysqli_num_rows($result44);
			
			$result51 = mysqli_query($polaczenie, "SELECT AVG(`ocena`) FROM `posty` WHERE `idp` = '1'");
			$ile51;
			while ($row = mysqli_fetch_array ($result51)){
				$ile51 = $row[0];
			}
			$result52 = mysqli_query($polaczenie, "SELECT AVG(`ocena`) FROM `posty` WHERE `idp` = '2'");
			$ile52;
			while ($row = mysqli_fetch_array ($result52)){
				$ile52 = $row[0];
			}
		?>
		
		<br>Ilość wszystkich zapytań wygenerowanych przez wszystkich klientów: <?php echo $ile1; ?>
		
		<br><br>Ilość wszystkich odpowiedzi udzielonych przez wszystkich pracowników: <?php echo $ile2; ?>
		
		<br><br>Ilość wszystkich odpowiedzi udzielonych przez wszystkich pracowników <br>z pogrupowaniem według pracowników:
		<br>- Pracownik1: <?php echo $ile31; ?>
		<br>- Pracownik2: <?php echo $ile32; ?>
		
		<br><br>Ilość wszystkich odpowiedzi udzielonych przez wszystkich pracowników <br>z pogrupowaniem według zagadnień:
		<br>- Sprzedaż nowych usług: <?php echo $ile41; ?>
		<br>- Pomoc techniczna: <?php echo $ile42; ?>
		<br>- Rezygnacja z usług: <?php echo $ile43; ?>
		<br>- Inne: <?php echo $ile44; ?>
		
		<br><br>Średnia ocen wszystkich pracowników, nadanych im przez klientów <br>z pogrupowaniem na pracowników:
		<br>- Pracownik1: <?php echo $ile51; ?>
		<br>- Pracownik2: <?php echo $ile52; ?>
		
	</body>
</html>