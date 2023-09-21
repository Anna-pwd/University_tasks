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
		$idt = $_POST['wyswietl'];
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
					<h3>Do końca testu pozostało:
						<p id="countdown"></p>
					</h3>
					<?php
						$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
						$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
						$result = mysqli_query($link, "SELECT * FROM `test` WHERE `idt` = '$idt'");
						$rekord = mysqli_fetch_array($result);
						$czas = $rekord['max_time'];
					?>
					<script>
						var startingMinutes = <?php echo $czas; ?>;
						let time = startingMinutes * 60;
						const countdownEl = document.getElementById('countdown');
						setInterval(updateCountdown, 1000)
						function updateCountdown() {
							const minutes = Math.floor(time / 60);
							let seconds = time % 60;
							seconds = seconds < 10 ? '0' + seconds : seconds;
							countdownEl.innerHTML = `${minutes}:${seconds}`;
							time--;
							time = time < 0 ? 0 : time;
							if (time == 0) {
								document.getElementById('sub').submit();
							}
						}
					</script>
					<p id="countdown"></p>	
						
					<?php
						$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
						$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
						$result = mysqli_query($link, "SELECT * FROM `pytanie` WHERE `idt` = '$idt'");
						
						$i = 1;

						$a = 'a'.$i;
						$b = 'b'.$i;
						$c = 'c'.$i;
						$d = 'd'.$i;
						$pytanie = $i.'';

					?>
					<form action="sprawdz.php" name="sprawdz" id="sub" method="post">
					<?php
						while ($wiersz = mysqli_fetch_array($result)){
							$idq = $wiersz[0];
							$pytanie = $i.'. '.$wiersz[2];
							$odpa = $wiersz[3];
							$odpb = $wiersz[4];
							$odpc = $wiersz[5];
							$odpd = $wiersz[6];

							print '<h3>'.$pytanie.'</h3>';
							print '<TR><TD>'.$odpa.'</TD><TD></TD><TD><input type="radio" value="a" name="odpa'.$idq.'"></TD></TR><br>';
							print '<TR><TD>'.$odpb.'</TD><TD></TD><TD><input type="radio" value="b" name="odpb'.$idq.'"></TD></TR><br>';
							print '<TR><TD>'.$odpc.'</TD><TD></TD><TD><input type="radio" value="c" name="odpc'.$idq.'"></TD></TR><br>';
							print '<TR><TD>'.$odpd.'</TD><TD></TD><TD><input type="radio" value="d" name="odpd'.$idq.'"></TD></TR><br>';
							print '<input type="number" name="idq'.$i.'" style="display: none;" value="'.$idq.'"<br>';
							$i = $i + 1;
						}
						$_SESSION['wyswietl'] = $idt;
						$_SESSION['i'] = $i;
					?>
				
					<br><input type="submit" value="Koniec"><br>
					</form>
					<br>
					<form action="testyprac.php" name="wybor">
						<input type="submit" value="Wróć do wyboru testu">
					</form><br>
				</article>
			</section>
		</div>
	</body>
</html>
		