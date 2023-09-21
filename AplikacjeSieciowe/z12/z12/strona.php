
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
	<?php
		session_start();
		$kto = $_SESSION['kto'];
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
		mysqli_query($link, "SET NAMES 'utf8'");				
		if(!$link){ 
			echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
		} 
		
		if($_SESSION['nazwisko']){
			$login = $_SESSION['nazwisko'];
			echo "Jesteś zalogowany/a jako $login.";
			echo '<form action="wyloguj.php" name="wyloguj">
					<input type="submit" value="Wyloguj">
				</form>';
		
/////////////////////////////////////////////////////////PRACOWNIK//////////////////////////////////////////////////////////

			if(($kto == 'pracownik') && ($login != 'admin')){
				$result = mysqli_query($link, "SELECT * FROM `$kto` WHERE `login`='$login'") or die ("DB error: loginpracownik"); 
				$rekord = mysqli_fetch_array($result);
				$idp = $rekord['idp'];
				
				$resultpr = mysqli_query($link, "SELECT * FROM `transakcje` WHERE `idp`='0'") or die ("db error: pracownik select");
				
	?>
				Potwierdź opłatę dla transakcji:
				<form method="post" action="poplate.php" name="poplate"><br>
					<input type="hidden" name="idp" value="<?php print $idp ?>">
					<select name="idt"><?php
					$resultop = mysqli_query($link, "SELECT * FROM `transakcje` WHERE `zaplacono`='0'")or die ("DB error: $dbname transakcje potwierdz");		
					while($wiersz = mysqli_fetch_array($resultop)){
						print '<option value="'.$wiersz[0].'">'.$wiersz[0].'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="Potwierdź transakcję">
				</form><br>
				Wybierz ofertę do weryfikacji:
				<form method="post" action="potwierdzoferte.php" name="potwierdzoferte"><br>
					<input type="hidden" name="idp" value="<?php print $idp ?>">
					<select name="ido"><?php
					$resultk = mysqli_query($link, "SELECT * FROM `oferty` WHERE `idp`='0'")or die ("DB error: $dbname strona.php");		
					while($wiersz = mysqli_fetch_array($resultk)){
						print '<option value="'.$wiersz[0].'">'.$wiersz[0].'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="Potwierdź weryfikację">
				</form><br><br>
				<?php
				print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>Numer transakcji</TD><TD>Data transakcji</TD><TD>Numer oferty</TD><TD>Klient</TD><TD>Zapłacono</TD></TR>\n";
				while ($row = mysqli_fetch_array ($resultpr)){
					$idt = $row[0];
					$data = $row[1];
					$ido = $row[2];				
					$idk = $row[4];
					$zaplacono = $row[5];
										
					if($zaplacono == 0){
						$typ = "Nie";
					}
					if($idto == 1){
						$typ = "Tak";
					}
				
					print "<TR style='width:auto;'><TD>$idt</TD><TD style='width:auto;'>$data</TD><TD style='width:auto;'>$ido</TD><TD style='width:auto'>$idk</TD><TD>$zaplacono</TD></TR>\n";
				}
				print "</TABLE><br>";
				
			}else{}
///////////////////////////////////////////////////////WŁAŚCICIEL////////////////////////////////////////////////////////////////////			
			if($kto == 'wlasciciel'){				    
				$result = mysqli_query($link, "SELECT * FROM `$kto` WHERE `login`='$login'"); 
				$rekord = mysqli_fetch_array($result);
				$idw = $rekord['idw'];
				
				echo '<h3>Dodaj ofertę</h3>
				<form method="post" action="dodajoferte.php" name="dodajoferte" enctype="multipart/form-data"><br>
					Opis: <input type="text" name="opis" style="width: 300px; height: 200px;" required><br>
					Adres: <input type="text" name="adres" required><br>
					Zdjęcie: <input type="file" name="fileToUpload" id="fileToUpload" name="fileToUpload"> <br>
					Cena: <input type="number" name="cena" required><br>
					Typ obiektu: <select name="typobiektu" id="typobiektu">
							<option value="1" selected>Mieszkanie</option>
							<option value="2">Dom</option>
							<option value="3">Działka budowlana</option>
							<option value="4">Wynajem</option>
					</select><br>
					<input type="hidden" name="idw" value="'.$idw.'">					
					<input type="submit" name="submit" value="Dodaj ofertę">
				</form><br><br>';
				
			}else{}
///////////////////////////////////////////////////////KUPIEC/////////////////////////////////////////////////////			
			if($kto == 'kupiec'){			
				$resultk2 = mysqli_query($link, "SELECT * FROM `$kto` WHERE `login`='$login'"); 
				$rekord = mysqli_fetch_array($resultk2);
				$idk = $rekord['idk'];				
				?>
				<h3>Wybierz nieruchomość w celu poznania jej adresu:</h3>
				<form method="post" action="kupicadres.php" name="kupicadres"><br>
					<input type="hidden" name="idk" value="<?php print $idk ?>">
					<select name="ido"><?php
					$resultk = mysqli_query($link, "SELECT * FROM `oferty`")or die ("DB error: $dbname strona.php");		
					while($wiersz = mysqli_fetch_array($resultk)){
						print '<option value="'.$wiersz[0].'">'.$wiersz[0].'</option>';
					}
					?>
					</select>
					<input type="submit" name="submit" value="Poznaj adres">
				</form><br><br>				
			<?php
			
			}else{}
		}
//////////////////////////////////////////////////////OFERTY///////////////////////////////////////////////////////////		
		if($login != 'admin'){
			$result1 = mysqli_query($link, "SELECT * FROM `oferty`")or die ("DB error: $dbname strona.php");
			
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>Numer oferty</TD><TD>Data dodania</TD><TD>Typ obiektu</TD><TD>Opis</TD><TD>Cena (zł)</TD><TD>Adres</TD><TD>Zdjęcie</TD></TR>\n";
			while ($row = mysqli_fetch_array ($result1)){
				$ido = $row[0];
				$data = $row[1];
				$opis = $row[4];				
				$idto = $row[6];
				$foto = $row[7];
				$cena = $row[8];
				
				if($idto == 1){
					$typ = "Mieszkanie";
				}
				if($idto == 2){
					$typ = "Dom";
				}
				if($idto == 3){
					$typ = "Działka budowlana";
				}
				if($idto == 4){
					$typ = "Wynajem";
				}
				
				$policz = mysqli_query($link, "SELECT * FROM `transakcje` WHERE ((`ido`='$ido') AND (`idk`='$idk') AND (`zaplacono`='1'))");
				$ile = mysqli_num_rows($policz);
				if(($kto == 'pracownik') || ($ile > 0)){
					$result5 = mysqli_query($link, "SELECT * FROM `oferty` WHERE `ido`='$ido'");
					while ($row = mysqli_fetch_array ($result5)){
						$adres = $row[5];
					}
					
				}else{
					$adres = 'Dane dostępne po wniesieniu opłaty';
				}
			
				
				print "<TR style='width:auto;'><TD>$ido</TD><TD style='width:auto;'>$data</TD><TD style='width:auto;'>$typ</TD><TD style='width:auto'>$opis</TD><TD>$cena</TD><TD>$adres</TD><TD style='width:auto;'><img src='fotki/".$foto."' width='200' height='200' alt='cosniedziala'></TD></TR>\n";
			}
			print "</TABLE>";

		echo '<form action="wyloguj.php" name="wyloguj">
				<input type="submit" value="Wróć do strony logowania">
			</form>';
		}	
//////////////////////////////////////////////////////ADMIN////////////////////////////////////////////////////////		
		if($login == 'admin'){
			echo "Udostępnienie adresu: 100zł";
			print "<br><br>";
			
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
			$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
			mysqli_query($link, "SET NAMES 'utf8'");	
		//1	
			$warunek1 = mysqli_query($link, "SELECT `ido`, COUNT(`ido`) FROM `transakcje` WHERE `idp` IS NOT NULL GROUP BY `ido` ORDER BY `ido` ASC");		
			echo 'Prowizja pracowników za udostępnianie adresów poszczególnych obiektów:';
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>Numer oferty</TD><TD>Ile razy przekazano adres</TD><TD>Prowizja 10%</TD></TR>\n";
			while ($row = mysqli_fetch_array ($warunek1)){
				$idoido = $row[0];
				$idoile = $row[1];
				$prowizja = 10 * $idoile;
				print "<TR style='width:auto;'><TD>$idoido</TD><TD style='width:auto;'>$idoile</TD><TD>$prowizja</TD></TR>\n";
			}
			print "</TABLE>";
			print "<br>";		
		//2
			echo 'Łączne prowizje poszczególnych pracowników: ';
			$warunek2 = mysqli_query($link, "SELECT `idp`, COUNT(`idp`) FROM `transakcje` GROUP BY `idp` ORDER BY `idp` ASC");
			print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>Numer pracownika</TD><TD>Ile razy przekazano adres</TD><TD>Prowizja 10%</TD></TR>\n";
				while ($row = mysqli_fetch_array ($warunek2)){
					$idoido = $row[0];
					$idoile = $row[1];
					$prowizja = 10 * $idoile;
					print "<TR style='width:auto;'><TD>$idoido</TD><TD style='width:auto;'>$idoile</TD><TD>$prowizja</TD></TR>\n";
				}
				print "</TABLE>";
				print "<br>";
		//3		
			print "Łączna prowizja wszystkich pracowników: ";
			$warunek3 = mysqli_query($link, "SELECT COUNT(`idp`) FROM `transakcje`");
			print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>Ilość przeprowadzonych transakcji</TD><TD>Prowizja 10%</TD></TR>\n";
				while ($row = mysqli_fetch_array ($warunek3)){
					$idoido = $row[0];
					$prowizja = 10 * $idoido;
					print "<TR style='width:auto;'><TD>$idoido</TD><TD>$prowizja</TD></TR>\n";
				}
				print "</TABLE>";
				print "<br>";
		//4	
			print "Łączny zysk pośrednictwa ze sprzedaży adresów wszystkich obiektów: ";
			$warunek4 = mysqli_query($link, "SELECT COUNT(`idp`) FROM `transakcje`");
			print "<TABLE CELLPADDING=5 BORDER=1>";
				print "<TR><TD>Ilość przeprowadzonych transakcji</TD><TD>Zysk (minus prowizja dla pracowników)</TD></TR>\n";
				while ($row = mysqli_fetch_array ($warunek4)){
					$idoido = $row[0];
					$prowizja = ((100 * $idoido) - (10 * $idoido));
					print "<TR style='width:auto;'><TD>$idoido</TD><TD>$prowizja</TD></TR>\n";
				}
				print "</TABLE>";
				print "<br>";			
		}	
		?>		
	</body>
</html>