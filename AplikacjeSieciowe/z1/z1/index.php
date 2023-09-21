<?php 
	session_start(); /*ustanowienie sesji*/
	
	if(!isset($_SESSION['proby'.$idt])){
		$_SESSION['proby'.$idt] = 0;
		$_SESSION['data'.$idt] = '-';
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="refresh" content="10" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		
		<title>Bagniewska</title>
		
	</head>
		
	<body style="background-color:grey">

		<?php
			
			$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska"; $dbpassword="1qaz@WSX"; $dbname="db-1";
			/*hasło na potrzeby laboratorium, w prawdziwym projekcie byłoby bardziej skomplikowane*/
			
			/*nawiązanie połączenia z bazą danych*/
			$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}
			
			/*utworzenie nagłówka tabeli, odczytywanie danych z tabeli z bazy danych*/
			$rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny") or die ("Błąd zapytania do bazy: $dbname");
			print "<TABLE CELLPADDING=5 BORDER=1>";
			print "<TR><TD>idt</TD><TD>Nazwa</TD><TD>Pracuje?</TD><TD>Ilość prób</TD><TD>Utrata komunikacji o godzinie:</TD></TR>\n";
			while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$idt = $wiersz[0];
				$nazwa = $wiersz[1];	
				$host = $nazwa;
				$port = '80';
				$proba;
				$data;
				
				{
					$fp = @fsockopen($host, $port, $errno, $errstr, 30);
					
					/*połączenie z witryną zakończone sukcesem, zerowanie zmiennych*/
					if ($fp) {
						$czy_pracuje = 'OK'; 
						$proba = 0;
						$czas = '-';
						$_SESSION['proby'.$idt] = 0;
						$_SESSION['data'.$idt] = '-';
						$data = '-';

					/*połącznie zakończone porażką, inkrementacja ilości prób połączenia z witryną, zapis daty wystąpienia awarii*/
					} else {
						$czy_pracuje = 'Awaria';
						$proba = $_SESSION['proby'.$idt] +1;
						$_SESSION['proby'.$idt]++;
						if ($proba == 1){
							$_SESSION['data'.$idt] = date("Y-m-d H:i:s");
							$data = $_SESSION['data'.$idt];
						}else{
							$data = $_SESSION['data'.$idt];
							}
						
					}	
					
				}
				
				/*wypisanie kolejnych wierszy tabeli na stronie*/
				print "<TR><TD>$idt</TD><TD>$nazwa</TD><TD>$czy_pracuje</TD><TD>$proba</TD><TD>$data</TD></TR>\n";
			}
			
			print "</TABLE>";
			
			/*zamknięcie połączenia z bazą danych*/
			mysqli_close($polaczenie);
			
		?>
	</body>
</html>