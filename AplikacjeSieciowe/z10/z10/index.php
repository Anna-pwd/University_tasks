<?php
	session_start();
	if($_SESSION['loggedin'] == true){
		header('Location: forum.php');
	}
	if($_SESSION['ban'] == true){
		echo "<p style='color: red;'>Twoje konto zostało zablokowane </p>";
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Bagniewska</title>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	</head>
	<body>
		Formularz logowania do forum<br>
		<form method="post" action="logowanie.php">
			Login:<input type="text" name="user" maxlength="20" size="20" required><br>
			Hasło:<input type="password" name="pass" maxlength="20" size="20" required><br>
			<input type="submit" name="zaloguj" value="Zaloguj"/>
		</form><br><br>

		Formularz rejestracji użytkowników<br>
		<form method="post" action="rejestracja.php">
			Login:<input type="text" name="ruser" maxlength="20" size="20" required><br>
			Hasło:<input type="password" name="rpass" maxlength="20" size="20" required><br>
			Powtórz hasło:<input type="password" name="rpass2" maxlength="20" size="20" required><br>
			<input type="submit" name="zarejestruj" value="Zarejestruj"/>
		</form>
		<a href="forum.php">Przejdź do forum bez logowania</a>
	</body>
</html>