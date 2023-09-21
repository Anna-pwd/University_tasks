<?php
	session_start();
	if (isset($_SESSION['loggedin'])){
		header('Location: stronaklient.php');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Bagniewska</title>
	</head>
	<BODY>
		Formularz logowania klientów
		<form method="post" action="weryfikujklient.php">
			Login:<input type="text" name="user" maxlength="20" size="20"><br>
			Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
			<input type="submit" value="Zaloguj"/>
		</form><br>
		<a href="index.php">Powrót do strony głównej</a>
	</BODY>
</HTML>