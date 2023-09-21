<?php
	$dbhost = "mysql01.abagniewska.beep.pl"; $dbuser = "abagniewska4"; $dbpassword = "1qaz@WSX"; $dbname = "db-4"; 
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname); 
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pracownicy"); 
	$zajete = mysqli_query($polaczenie, "SELECT SUM(obecnosc) FROM pracownicy") or die ("Błąd zapytania do bazy zajete: $dbname");
	$pomieszczenie = mysqli_fetch_array($zajete);
	
	print "<table cellpadding=5 border=1>";
	print "<tr><td>Nazwisko</td><td>Zdjęcie</td></tr>\n";
	while ($wiersz = mysqli_fetch_array ($rezultat)) {
		$id = $wiersz[0];
		$nazwisko = $wiersz[1];
		$obecnosc =$wiersz[2];
		$obrazek = $wiersz[3];
		if($obecnosc == 0){
			$obrazek = "$obrazek"."c";
			$kolor = "#8F9699";
		}else{
			$obrazek = $obrazek;
			$kolor = "#FFFFFF";
		}
		print "<tr><td style='background-color:$kolor;'>$nazwisko </td><td><img src='$obrazek.jpg'; style='width:100px; height:100px'/></td></tr>\n";
	}
	print "</table><div style='float: left;'>";
	mysqli_close($polaczenie);
?>

<html lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body>
	<div><img src="img/budynek.jpg"/>

		<div>
		<img style="position: absolute; top: 650px; left: 35px;" src="<?php
					if ($pomieszczenie[0]==1 | $pomieszczenie[0]==2 | $pomieszczenie[0]==3 | $pomieszczenie[0]==4 | $pomieszczenie[0]==5){
				echo 'img/osoba.gif';
			}else{
				echo 'img/puste.jpg';
			}
			?>" width=100 height=100>
		</div>
		<div>
		<img style="position: absolute; top: 780px; left: 35px;" src="<?php
			if ($pomieszczenie[0]==2 | $pomieszczenie[0]==3 | $pomieszczenie[0]==4 | $pomieszczenie[0]==5){
				echo 'img/osoba.gif';
				}else{
				echo 'img/puste.jpg';
			}
			?>" width=100 height=100>
		</div>
		<div>
		<img style="position: absolute; top: 650px; left: 370px;" src="<?php
			if ($pomieszczenie[0]==3 | $pomieszczenie[0]==4 | $pomieszczenie[0]==5){
				echo 'img/osoba.gif';
				}else{
				echo 'img/puste.jpg';
			}		
					?>" width=100 height=100>
		</div>
		<div>
		<img style="position: absolute; top: 780px; left: 370px;" src="<?php
			if ($pomieszczenie[0]==4 | $pomieszczenie[0]==5){
				echo 'img/osoba.gif';
				}else{
				echo 'img/puste.jpg';
			}	
					?>" width=100 height=100>
		</div>
		<div>
		<img style="position: absolute; top: 650px; left: 510px;" src="<?php
			if ($pomieszczenie[0]==5){
				echo 'img/osoba.gif';
				}else{
				echo 'img/puste.jpg';
			}	
					?>" width=100 height=100>
		</div>
	</div>
	</body>
</html>