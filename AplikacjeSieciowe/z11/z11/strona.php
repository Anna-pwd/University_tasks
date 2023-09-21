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
			echo "Jesteś zalogowany jako $login.";
			$title = $_POST['wyswietl'];
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
						?>
					</ul>
				</nav>
			</aside>
		</div>
		<div>
			Jesteś przypisany/a do następujących podzadań:
			<?php
				$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska11"; $dbpassword="1qaz@WSX"; $dbname="db-11";
				$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
				$result = mysqli_query($connection, "SELECT * FROM `podzadanie` WHERE `idp`='$idp'") or die ("DB error: strona ");
				print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>ID zadania</TD><TD>ID podzadania</TD><TD>Nazwa</TD><TD>Project Manager</TD></TR>";
				while ($row = mysqli_fetch_array ($result)){
					$idpz = $row[0];
					$idz = $row[1];
					$idm = $row[2];
					$nazwa = $row[4];
					$stan = $row[5];
					$red = 'red';
					$green = 'green';
					if($stan == '100'){
						$color = $green;
					}else{
						$color = $red;
					}
					print '<TR><TD>'.$idz.'</TD><TD>'.$idpz.'</TD><TD style="color:'.$color.';">'.$nazwa.'</TD><TD>'.$idm.'</TD></TR><br>';
				}
				print "</TABLE>";
				$_SESSION['idp'] = $idp;
			?>
		</div>
	</body>
</html>