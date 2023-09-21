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
		
		<br>
		<div>
			<section>
				<article>
				<?php
					$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
					$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
					$result = mysqli_query($connection, "Select * from `pracownicy`") or die ("DB error: $dbname stronaadmin");
					print "<TABLE CELLPADDING=5 BORDER=1>";
					print "<TR><TD>ID</TD><TD>Nazwisko</TD><TD>Ilość logowań</TD><TD>Ostatnie logowanie</TD><TD>Ilość podejść do testów</TD></TR>\n";
					while ($row = mysqli_fetch_array ($result)){
						$id = $row[0];
						$login = $row[1];
						$ilosc = $row[3];
						$ostatnie = $row[4];
						$podejscie = $row[5];

						print "<TR><TD>$id</TD><TD>$login</TD><TD>$ilosc</TD><TD>$ostatnie</TD><TD>$podejscie</TD></TR>\n";
					}
					print "</TABLE>";
				?>
				</article>
			</section>
		</div>
	</body>
</html>