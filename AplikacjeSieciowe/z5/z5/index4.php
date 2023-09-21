<?php declare(strict_types=1);
	session_start();
	if (!isset($_SESSION['loggedin'])){
		header('Location: index3.php');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
	<title>Bagniewska</title>
</head>
<BODY>
	<a href="logout.php">Wyloguj</a><br/>
</body>
</html>