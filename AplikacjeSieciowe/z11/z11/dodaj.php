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
			$idz = $_POST['idz'];
			echo "Jesteś zalogowany/a jako $login.";	
		?>
		<form action="wyloguj.php" name="wyloguj">
				<input type="submit" value="Wyloguj">
		</form>
		<div class="lewa" style="float: left; margin-right: 20px; height: 400px;">
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
						?>
					</ul>
				</nav>
			</aside>
		</div>
		<div>					
		<?php		
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			$result = mysqli_query($link, "SELECT * FROM `pracownik`");
		
			$_SESSION['nazwisko'] = $login;
		?>		
		</div>		
		<div>
			<form method="post" action="dodajphp.php" name="forms">
				<br>Wybierz pracownika do zadania: 
				<select name="idp">
				<?php
					while ($wiersz = mysqli_fetch_array($result)) {
						print '<option value="'.$wiersz[0].'">'.$wiersz[1].'</option>';
					}
				?>
				</select>
				<br>Podaj nazwę podzadania:
				<br><input type="text" name="nazwa">
				<br><input type="number" name="idz" value="<?php echo $idz; ?>" style="display: none;">
				<input type="submit" value="Dodaj">
			</form>
		</div>
	</body>
</html>