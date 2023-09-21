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
	?><br><br>
	Wybierz zagadnienie:
	<form method="POST" action="addpostklient.php">
		<select id="kategoria" name="kategoria">
			<option value=1 selected>Sprzedaż usług</option>
			<option value=2>Pomoc techniczna</option>
			<option value=3>Rezygnacja z usługi</option>
			<option value=4>Inne</option>
		</select><br><br>
		Treść pytania:<input type="text" name="tresc" style="width: 300px; height: 100px;" required><br>	<br>
		<input type="submit" value="Wyślij"/></form>	<br><br>
		<a href="stronaklient.php">Powrót do strony głównej</a>
	</body>
</html>
