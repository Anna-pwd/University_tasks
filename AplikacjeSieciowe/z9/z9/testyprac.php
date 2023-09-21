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
						<li><a href="wynikiprac.php">Wyniki testów</a></li>
						<li><a href="lekcjeprac.php">Otwórz lekcje</a></li>
						<li><a href="testyprac.php">Rozwiąż test</a></li>
						<br><img src="rek.jpg" width="160" height="600" alt="cosniedziala">
					</ul>
				</nav>
			</aside>
		</div>
		<div>
			<section>
				<article>
				<?php
					$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
					$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
					$result = mysqli_query($link, "SELECT * FROM `test`");

					print "<TABLE CELLPADDING=5 BORDER=1>";
					print "<TR><TD>Tytuł testu</TD><TD>Wyświetl</TD></TR>\n";
					while ($wiersz = mysqli_fetch_array($result)){
						$id = $wiersz[0];
						$title = $wiersz[2];
						$test = '<form action="testwyswietl.php" name="wyswietl" method="post">
							<input name="wyswietl" type="text" value="'.$id.'" style="display: none;">
							<input type="submit" value="Wyświetl">
						</form>';
						print "<TR><TD>$title</TD><TD>$test</TD></TR>\n";							
					}		
					print "</TABLE>";
				?>
				</article>
			</section>
		</div>
	</body>
</html>