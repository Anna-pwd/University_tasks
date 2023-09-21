<?php
	session_start();
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska8"; $dbpassword="1qaz@WSX"; $dbname="db-8";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	$result = mysqli_query($link, "SELECT * FROM `cms` WHERE `id_cms`='1'");
	$rekord = mysqli_fetch_array($result);
	$logo = $rekord['logo_file'];

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
	<script src="ckeditor/ckeditor.js" ></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bagniewska</title>
</HEAD>
<BODY>
<header>
	<h1 class="logo"><img src="<?php echo $logo ?>" width="600" height="50"</h1>
</header>
	<div class="lewa" style="float: left; margin-right: 20px;">
		<aside>
			<nav>
				<h2>Menu</h2>
				<ul>
					<li><a href="index.php">O firmie</a></li>
					<li><a href="kontakt.php">Kontakt</a></li>
					<li><a href="dojazd.php">Jak do nas dotrzeć</a></li>
					<li><a href="oferta.php">Oferta</a></li>
					<li><a href="chat.php">Chatbot</a></li>
					
					<?php 
						if ($_SESSION['loggedin']){
							echo '<li><a href="logo.php">Zmiana logo</a></li>';
							echo '<li><a href="historia.php">Historia ChatBota</a></li><br>';
							echo "Zalogowano jako: ";
							echo $_SESSION['login']; 
							echo '<form action="wyloguj.php" name="wyloguj">
									<input type="submit" value="Wyloguj"><br>
								  </form>';
							
						}else{
					
						echo	'Admin logowanie<br>
								<form method="POST" action="zalogujadministratorphp.php" name="zaloguj">
									Login:<input type="text" name="user" maxlength="20" size="20" required><br>
									Hasło:<input type="password" name="pass" maxlength="20" size="20" required><br>
									<input type="submit" value="Zaloguj">
								</form>';
						}
					?>
				</ul>
			</nav>
		</aside>
	</div>
	<div>
		<article>
			<section>
				<header><h1>Historia ChatBota</h1></header>
				<?php
					$result2 = mysqli_query($link, "SELECT * FROM `chatbot` ORDER BY `datetime` DESC");
					print "<TABLE CELLPADDING=5 BORDER=1>";
					print "<TR><TD>ID</TD><TD>Data</TD><TD>Pytanie</TD><TD>Odpowiedź</TD></TR>\n";
					while ($row = mysqli_fetch_array ($result2)){
						$id = $row[0];
						$date = $row[1];
						$question = $row[2];
						$answer = $row[3];

						print "<TR><TD>$id</TD><TD>$date</TD><TD>$question</TD><TD>$answer</TD></TR>\n";
					}
					print "</TABLE>";
				?>		
			</section>
		</article>
	</div>	
</body>
</html>