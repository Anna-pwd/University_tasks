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
		
		<br>
		Wybierz kategorię pytań:
		<br>
		<a href ="snu.php">Sprzedaż nowych usług</a><br>  
		<a href ="pt.php">Pomoc techniczna</a><br>
		<a href ="rzu.php">Rezygnacja z usług</a><br>
		<a href ="inne.php">Inne</a><br>
		<form method="POST" action="wyloguj.php">
			<input type="submit" value="Wyloguj"/>
		</form>
	</body>
</html>