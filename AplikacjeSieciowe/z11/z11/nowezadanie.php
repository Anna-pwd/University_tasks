<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
		<?php
			session_start();
			if(!$_SESSION['nazwisko']){
				header('Location:index.php');
			}
			$login = $_SESSION['nazwisko'];
			$idp = $_SESSION['idp'];
			echo "Jesteś zalogowany/a jako $login.";			
		?>
		<form action="wyloguj.php" name="wyloguj">
				<input type="submit" value="Wyloguj">
		</form>
		<div class="lewa" style="float: left; margin-right: 20px;">
			<aside>
				<nav>
					<h2>Menu</h2>
					<ul>
						<li><a href="strona.php">Twoje zadania</a></li>
						<li><a href="nowezadanie.php">Stwórz nowe zadanie</a></li>
						<li><a href="nowepodzadanie.php">Dodaj nowe podzadanie</a></li>
						<li><a href="ocena.php">Oceń postęp swoich zadań</a></li>
						<?php
							if($login == 'admin'){
								echo '<li><a href="logi.php">Logi użytkowników</a></li>
									  <li><a href="postep.php">Postępy zadań</a></li>';
							}else{}
							$_SESSION['nazwisko'] = $login;
						?>
					</ul>
				</nav>
			</aside>
		</div>
		<div>
			Stwórz nowe zadanie:
			<form method="post" action="nowezadaniephp.php" name="nowez">
				Nazwa zadania:
				<input type="text" name="nazwa">
				<input type="number" value="<?php echo $idp; ?>" name="idp" style="display: none">
				<input type="submit" value="Stwórz">
			</form>
		</div>
	</body>
</html>