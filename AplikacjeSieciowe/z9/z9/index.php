<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title>Bagniewska</title>
	</head>

	<body>
		<div style="float: left; margin-right: 20px;">
			<aside>
				<nav>
					<ul>
						<img src="rek.jpg" width="160" height="600" alt="cosniedziala">
					</ul>
				</nav>
			</aside>
		</div>
		<div>
			Zaloguj się lub zarejestruj na portalu e-learningowym!<br><br>
			Formularz rejestrowania pracowników
			<form method="post" action="rejestrujpracownik.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				Powtórz hasło: <input type="password" name="pass2" maxlength="20" size="20"><br>
				<input type="submit" value="zarejestruj"/>
			</form><br>
		
			Formularz logowania pracowników
			<form method="post" action="weryfikujpracownik.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				<input type="submit" value="Zaloguj"/>
			</form><br>

			Formularz logowania szkoleniowców
			<form method="post" action="weryfikujszkoleniowiec.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				<input type="submit" value="Zaloguj"/>
			</form><br>
		</div>
	</body>
</html>

