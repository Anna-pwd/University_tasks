<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title>Bagniewska</title>
	</head>

	<body>
	<?php 
		session_start();
		if (!isset($_SESSION['loggedin'])){
			header('Location: index.php');
		}
		$login = $_SESSION['nazwisko'];
		echo "Jesteś zalogowany jako $login.";
	?>
		<div>
			<form action="wyloguj.php" name="wyloguj">
				<input type="submit" value="Wyloguj">
			</form><br>
		</div>
	<br>
		<div class="lewa" style="float: left; margin-right: 20px;">
			<aside>
			<br><img src="rek.jpg" width="160" height="600" alt="cosniedziala">
			</aside>
		</div>
		<div>
			<br>Formularz rejestrowania szkoleniowców:
			<form method="post" action="rejestrujszkoleniowiec.php">
				Login: <input type="text" name="user" maxlength="20" size="20"><br>
				Hasło: <input type="password" name="pass" maxlength="20" size="20"><br>
				Powtórz hasło: <input type="password" name="pass2" maxlength="20" size="20"><br>
				<input type="submit" value="zarejestruj"/>
			</form><br>
		</div>
	</body>
</html>