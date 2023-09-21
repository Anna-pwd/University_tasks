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
					</ul>
				</nav>
			</aside>
		</div>
		<div style="clear: both;"></div>
		<div>
			<section>
				<article>
					<h2>Dodaj nową lekcję</h2>
					<form method="post" action="nowalekcjaphp.php" name="lekcja" enctype="multipart/form-data">
						Tytuł:<br>
						<input type="text" name="title"><br>
						Wybierz grafikę:<br>
						<input type="file" name="fileToUpload" id="fileToUpload"> <br>
						Tekst strony:<br>
						<textarea id="tekst" name="tresc" style="width: 500px; height: 200px;"></textarea><br>
						<input type="submit" name="submit" value="Dodaj lekcję">
					</form>
					<script type="text/javascript">
						CKEDITOR.replace("tekst");
					</script>				
				</article>
			</section>
		</div>		
	</body>
</html>
