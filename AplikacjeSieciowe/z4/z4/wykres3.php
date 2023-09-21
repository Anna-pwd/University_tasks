<?php
	$dbhost = "mysql01.abagniewska.beep.pl"; $dbuser = "abagniewska4"; $dbpassword = "1qaz@WSX"; $dbname = "db-4"; 
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname); 
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id ASC "); 
	
    $ile = 0;
	$dane = array();
	
    while ($wiersz = mysqli_fetch_array($rezultat)){ 
		$id = $wiersz[0]; 
		$x1 = $wiersz[1]; 
		$x2 = $wiersz[2]; 
		$x3 = $wiersz[3]; 
		$x4 = $wiersz[4]; 
		$x5 = $wiersz[5]; 
		$datetime = $wiersz[6]; 

		$k = 'k'.$ile;
		$$k = ','.$ile.','.$x1.','.$x2.','.$x3.','.$x4.','.$x5;
		array_push($dane, explode(',',$$k));
		
		$ile = $ile + 1;
    }
	
    mysqli_close($polaczenie);
	
    require_once 'phplot.php'; 
	$plot = new PHPlot();
	$plot->SetFailureImage(False); 
	$plot->SetPrintImage(False); 
	$plot->SetImageBorderType('plain');
	$plot->SetPlotType('lines');
	$plot->SetDataType('data-data');
	$plot->SetDataValues($dane);
	$plot->SetTitle('Wykres 3');
	$plot->SetLegend((array('X1','X2','X3','X4','X5')));
	$plot->SetLegendPosition(0, 0, 'world', 0, 0);
	$plot->SetXLabelType('data');
	$plot->SetYLabelType('data');
	$plot->SetDrawXGrid(True);
	$plot->SetDrawYGrid(True);
    $plot->SetMarginsPixels(100);
    $plot->SetLegendPixels(10, 10);
	$plot->SetXTitle("Kolejny pomiar"); 
	$plot->SetPrecisionX("0"); 
	$plot->SetHorizTickIncrement("1"); 
	$plot->DrawGraph();
?>

<html>
	<head>
		<title>Bagniewska</title>
	</head>
	<body>
		<img src="<?php echo $plot->EncodeImage();?>">
	</body>
</html>
