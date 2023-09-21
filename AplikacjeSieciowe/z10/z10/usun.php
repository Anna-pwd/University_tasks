<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
	<?php
		session_start();
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
		mysqli_query($link, "SET NAMES 'utf8'");				
		if(!$link){ 
			echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
		} 
//////////////////////////////////////////JESLI ZALOGOWANO		
		if($_SESSION['login']){
			$login = $_SESSION['login'];
			$result = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='$login'");
			$rekord = mysqli_fetch_array($result);
			$id = $rekord['id'];
			
			echo "Jesteś zalogowany/a jako $login.";
			echo '<form action="wyloguj.php" name="wyloguj">
					<input type="submit" value="Wyloguj">
				</form>';
		}
////////////////////DLA WSZYSTKICH
	?>
		<div class="lewa" style="float: left; margin-right: 20px;">
			<aside>
				<nav>
					<h2>Menu</h2>
					<ul>
						<li><a href="forum.php">Strona główna</a></li>
						<?php	
						if($_SESSION['login']){
							echo '<li><a href="nowytemat.php">Utwórz/usuń temat</a></li>'; 
						} 
						?>
						<li><a href="wyloguj.php">Wróć do strony logowania</a></li>
						
						<?php 
///////////////////////DLA ADMINA
						if ($login == 'admin'){
							echo '<li><a href="usun.php">Usuń lub zablokuj użytkownika</a></li>';
						}
						?>
					</ul>
				</nav>
			</aside>
		</div>
		<div>
		Wybierz użytkownika:<br>
		<form action="usunphp.php" method="post" name="usun">
			<select name="userid" id="userid">
					<?php $results = mysqli_query($link, "SELECT * FROM `users` WHERE `login`!='admin'") or die ("DB error: $dbname playlist");		
						while($wiersz = mysqli_fetch_array($results)){
							print '<option value="'.$wiersz[0].'">'.$wiersz[1].'</option>';
						}
					?>
					</select><br><br>
					Co chcesz zrobić?<br>
					<input type="radio" name="usun" value="0">Usuń konto użytkownika<br>
					<input type="radio" name="usun" value="1">Zablokuj użytkownika<br>
					<input type="radio" name="usun" value="2">Odblokuj użytkownika<br>					
					<input type="submit" value="Zatwierdź">
				</form>
		</div>
	</body>
</html>