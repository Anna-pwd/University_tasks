<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title>Bagniewska</title>
	</head>

	<body>
		<div>
			Zaloguj się lub zarejestruj na portalu udostępniającym muzykę<br><br>
			Formularz rejestrowania:
			<form method="post" action="rejestruj.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				Powtórz hasło: <input type="password" name="pass2" maxlength="20" size="20"><br>
				<input type="submit" value="zarejestruj"/>
			</form><br>
				
			Formularz logowania:
			<form method="post" action="weryfikuj.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				<input type="submit" value="Zaloguj"/>
			</form><br>
			
		</div>
		<div>
			<a href="strona.php">Przejdź do muzyki bez logowania</a>
		</div>
	</body>
</html>

