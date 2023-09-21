<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="main.css" type="text/css"/>
	
	<title>Bagniewska</title>
	
</head>
	
<body>

	<div>
	<a href="index1.php" target="_blank">Skrypt 1</a>
	</div>
	
	<div>
	<a href="index2.php" target="_blank">Skrypt 2 (Otwarte porty: 80, 443, ping)</a>
	</div>
	
	<div>
	<a href="index3.php" target="_blank">Skrypt 3 (Nie działa na tym hostingu).</a>
	</div>
	
	<div>
	<a href="index4.php" target="_blank">Skrypt 4 (Nie działa na tym hostingu).</a>
	</div>
	
	<div>
	<a href="index5.php" target="_blank">Skrypt 5</a>
	</div>
	
	<div>
	<a href="index6.php" target="_blank">Skrypt 6</a>
	</div>
	
	<div>
	<a href="index7.php" target="_blank">Skrypt 7</a>
	</div>
	
	<div>
	<a href="index8.php" target="_blank">Skrypt 8</a>
	</div>
	
	<div>
	<a href="index9.php" target="_blank">Skrypt 9</a>
	</div>
	</br>	

<?php
	require_once "db.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	$polaczenie = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
	if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$data = date("Y-m-d H:i:s");
	
	$polaczenie->query("INSERT INTO goscieportalu VALUES (NULL, '$ipaddress', '$data')");
	$rezultat = $polaczenie->query("SELECT *, MAX(data) FROM goscieportalu GROUP BY ip ORDER BY MAX(data) DESC") or die ("Błąd zapytania do bazy: $dbname");
	
	function ip_details($ip) {
				$json = file_get_contents ("http://ipinfo.io/{$ip}/geo");
				$details = json_decode ($json);
				return $details;
	}

			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>IP</TD><TD>Data</TD><TD>Lokalizacja</TD><TD>Link</TD></TR>\n";
			while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$ipaddress = $wiersz[1];
				$data = $wiersz[3];
				$details = ip_details($ipaddress);
				$lokalizacja = $details -> country;
				$lokalizacja .= " ";
				$lokalizacja .= $details -> city;
				$lok = $details -> loc;
				$strona = "<a href='https://www.google.pl/maps/search/{$lok}/' target='_blank'>Mapa</a>";

				print "<TR><TD>$ipaddress</TD><TD>$data</TD><TD>$lokalizacja</TD><TD>$strona</TD></TR>\n";
				
			}
			
			print "</TABLE>";
			
	$polaczenie->close();
?>
</body>
</html>
