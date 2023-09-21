<?php
	session_start();

	if (isset($_SESSION['loggedin'])){
		header('Location: stronaklient.php');
	}
			
?>

<html>
	<head>
	<title>Bagniewska</title>
	</head>
	<body>
		<form method="POST" action="addklient.php"><br>
			Nazwisko:<input type="text" name="nazwisko" required><br>
			Hasło:<input type="password" name="haslo" required><br>			
			Powtórz hasło:<input type="password" name="haslo2" required><br>		
			<input type="submit" value="Zarejestruj"/>
		</form>
		<a href="index.php">Powrót do strony głównej</a>
	</body>
</html>
			
			