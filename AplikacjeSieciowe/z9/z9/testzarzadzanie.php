<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<script src="ckeditor/ckeditor.js"></script>
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
		<br>
		<form action="wyloguj.php" name="wyloguj">
			<input type="submit" value="Wyloguj">
		</form><br>
		
		<div class="lewa" style="float: left; margin-right: 20px;">
			<aside>
				<nav>
					<h2>Menu</h2>
					<ul>
						<li><a href="wyniki.php">Wyniki testów pracowników</a></li>
						<li><a href="statystyka.php">Statystyka logowań pracowników</a></li>
						<li><a href="nowalekcja.php">Stwórz nową lekcję</a></li>
						<li><a href="lekcjazarzadzanie.php">Zarządzaj lekcjami</a></li>
						<li><a href="nowytest.php">Utwórz nowy test</a></li>
						<li><a href="testzarzadzanie.php">Edytuj test</a></li>
						<br><img src="rek.jpg" width="160" height="600" alt="cosniedziala">
					</ul>
				</nav>
			</aside>
		</div>
		
		<div>
			<section>
				<article>
					<h2>Lista stworzonych testów</h2>
					<?php
						$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
						$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
						$result = mysqli_query($link, "SELECT * FROM `test` WHERE `szkoleniowiec`='$login'");
						
						print "<TABLE CELLPADDING=5 BORDER=1>";
						print "<TR><TD>Nr</TD><TD>Tytuł</TD><TD>Dodaj pytanie</TD><TD>Usuń Test</TD></TR>\n";
						while ($wiersz = mysqli_fetch_array($result)){
							$idt = $wiersz[0];
							$title = $wiersz[2];
							
							$dodaj = '<form action="dodajpytanie.php" name="dodaj" method="post">
								<input name="idt" type="text" value="'.$idt.'" style="display: none;">
								<input type="submit" value="Dodaj pytanie">
							</form>';
								
							$edytuj = '<form action="edytujpytanie.php" name="edytuj" method="post">
								<input name="idt" type="text" value="'.$idt.'" style="display: none;">
								<input type="submit" value="Edytuj">
							</form>';
							$usun = '<form action="usuntest.php" name="usun" method="post">
								<input name="idt" type="text" value="'.$idt.'" style="display: none;">
								<input type="submit" value="Usuń">
							</form>';

							print "<TR><TD>$idt</TD><TD>$title</TD><TD>$dodaj</TD><TD>$usun</TD></TR>\n";							
						}							
						print "</TABLE>";					
					?>
				</article>
			</section>
		</div>		
	</body>
</html>