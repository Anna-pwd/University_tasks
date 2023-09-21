<?php 
	$dbhost = "mysql01.abagniewska.beep.pl"; $dbuser = "abagniewska4"; $dbpassword = "1qaz@WSX"; $dbname = "db-4";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	$rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id DESC LIMIT 1");
	
	while ($wiersz = mysqli_fetch_array ($rezultat)) {
		$id = $wiersz[0];
		$x1 = $wiersz[1];
		$x2 = $wiersz[2];
		$x3 = $wiersz[3];
		$x4 = $wiersz[4];
		$x5 = $wiersz[5];
		$datetime = $wiersz[6];
	}

	mysqli_close($polaczenie);
	
	require_once 'phplot.php';
	$plot = new PHPlot();
	$data = array(array('Wartosc', 0, $x1), array('', 1, $x2), array('', 2, $x3), array('', 3, $x4), array('', 4, $x5),);
	$plot->SetDataValues($data);
	$plot->SetDataType('data-data');
	$plot->SetTitle('Przyklad wykresu liniowego nr 2');// opcjonalny tytuł wykresu
	$plot->DrawGraph();
	
?>
