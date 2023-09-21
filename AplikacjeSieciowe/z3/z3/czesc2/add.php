<?php
	$time = date('H:i:s', time());
	$user = $_POST['user'];
	$post = $_POST['post'];
	
	if (IsSet($_POST['post']))
	{
	// utworzenie ciasteczka
	setcookie('nick', $user);	
	$_COOKIE['nick'] = $_POST['user'];

		
		$text = '<table border=”1” width="90%">
		<tr><td>'.$post.'</td><td width="80">' . $user . '</td><td width="60" bgcolor="yellow">'. $time.'</td></tr></table><br>';
		$file = fopen ("conversation.txt", "a+");
		fwrite ($file, $text);
}
	header ('Location: index.php'); // aby ponownie załadować plik index.php, po wykonaniu pliku add.php
?>
<html>
<head>
<title>Bagniewska</title>
</head>