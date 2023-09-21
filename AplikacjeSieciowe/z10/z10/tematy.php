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
	<br>
		<?php
			session_start();
			$idt = $_POST['temat'];
			if($login != ''){	
			echo '<form action="dodajpost.php" name="nowypost" method="post" enctype="multipart/form-data">
						Podaj treść postu: <input type="text" name="tresc" style="width: 500px;"><br>
						Obrazek: <input type="file" name="fileToUpload" id="fileToUpload" name="fileToUpload"> <br>
						<input type="hidden" value="'.$login.'" name="login">
						<input type="hidden" value="'.$idt.'" name="idt">
						<input type="submit" value="Dodaj post">
				</form>';	
			}
			if($_SESSION['idt']){
				$idt = $_SESSION['idt'];
			}else{
				$idt = $_POST['temat'];
			}
			$resultt = mysqli_query($link, "SELECT * FROM `posty` WHERE `idt`='$idt'");
			
			print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>Autor wpisu</TD><TD>Treść</TD></TR>\n";
				while ($row = mysqli_fetch_array ($resultt)){
					$idp = $row[0];
					$tresc = $row[2];
					$autor = $row[3];				
					$obrazek = $row[4];		
					$ban = $row[5];
					if($ban == '1'){
						$tresc = 'Post nie zostanie wyświetlony, bo zawiera wulgaryzmy.';
					}else{}
						if($obrazek != ''){
					$grafika = "<img src='obrazki/".$obrazek."' width='100' height='100' alt='cosniedziala'>";
						}else{ $grafika = '';}
						
					print "<TR style='width:auto;'><TD>$autor</TD><TD style='width:auto;'>$tresc <br> $grafika</TD></TR>\n";
				}
			print "</TABLE>";
			unset($_SESSION['idt']);
			$_SESSION['login'] = $login;
		?>
		</div>
	</body>
</html>