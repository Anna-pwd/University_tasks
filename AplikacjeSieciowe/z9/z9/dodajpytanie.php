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
		if(!$_POST['idt']){
			$idt = $_SESSION['idt'];
		}else{
			$idt = $_POST['idt'];
		}
		
		$login = $_SESSION['nazwisko'];
		echo "Jesteś zalogowany jako $login.";
		$reklama = 'reklama.png';
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
						<img src="rek.jpg" width="160" height="600" alt="cosniedziala">
					</ul>
				</nav>
			</aside>
		</div>
		<br>
		<div>
			<section>
				<article>
					<h2>Dodaj pytanie do testu</h2>
					<form method="post" action="dodajpytaniephp.php" name="dodaj">
						<input type="text" name="idt" style="display: none;" value="<?php $idt ?>">
						Pytanie:<br>
						<input type="text" name="pytanie"><br>
				
						Odpowiedź A:<br>
						<input type="text" name="odpa"><br>
						
						Odpowiedź B:<br>
						<input type="text" name="odpb"><br>
						
						Odpowiedź C:<br>
						<input type="text" name="odpc"><br>
						
						Odpowiedź D:<br>
						<input type="text" name="odpd"><br>
						
						Poprawna odpowiedź:
						<select id="odp" name="odp">
							<option value="a" selected>A</option>
							<option value="b">B</option>
							<option value="c">C</option>
							<option value="d">D</option>
						</select><br><br>
				
						<input type="submit" name="submit" value="Dodaj pytanie">
					</form>
				</article>
			</section>
		</div>		
	</body>
</html>
<?php 
	$_SESSION['idt'] = $idt;
?>

	
	