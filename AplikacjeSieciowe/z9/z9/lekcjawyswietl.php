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
		$title = $_POST['wyswietl'];
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
						<img src="rek.jpg" width="160" height="600" alt="cosniedziala">
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
					$result = mysqli_query($link, "SELECT * FROM `lekcje` WHERE `title` = '$title'");
					while ($wiersz = mysqli_fetch_array($result)){
						$title = $wiersz[1];
						$tresc = $wiersz[2];
						$grafika = $wiersz[3];
					}
					echo '<h2>'.$title.'</h2>';
					echo '<a href="lekcjeprac.php">Wróć do wyboru lekcji</a>';
					echo $tresc;					
				?>
				<br>
				<?php 
					if($grafika != ''){
						echo '<img src="'.$grafika.'" height="200" alt="cosniedziala>'; 
					}else{
						echo ' ';
					} 
				?>
				<br><br>
				<a href="lekcjeprac.php"></a>
				</article>
			</section>
		</div>
	</body>
</html>