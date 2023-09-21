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
		Stwórz nowe podzadanie do zadania:
		<?php
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			$result = mysqli_query($link, "SELECT * FROM `zadanie` WHERE `idp`='$idp'");
			
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>Nr zadania</TD><TD>Tytuł</TD><TD>Dodaj podzadanie</TD></TR>\n";
			while ($wiersz = mysqli_fetch_array($result)){
				$idz = $wiersz[0];
				$title = $wiersz[2];		
				$dodaj ='<form action="dodaj.php" name="dodaj" method="post">
							<input name="idz" type="number" value="'.$idz.'" style="display: none;">
							<input type="submit" value="Dodaj">
						</form>';				
				print "<TR><TD>$idz</TD><TD>$title</TD><TD>$dodaj</TD></TR>\n";
			}
			print "</TABLE>";
			$_SESSION['nazwisko']= $login ;
			$_SESSION['idp'] = $idp;
		?>
		</div>		
	</body>
</html>