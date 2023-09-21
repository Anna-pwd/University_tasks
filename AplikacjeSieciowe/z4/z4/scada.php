<?php
	$dbhost = "mysql01.abagniewska.beep.pl"; $dbuser = "abagniewska4"; $dbpassword = "1qaz@WSX"; $dbname = "db-4"; 
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname); 
    $rezultat = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id DESC LIMIT 5"); 
	$rezultat2 = mysqli_query($polaczenie, "SELECT * FROM pomiary ORDER BY id ASC"); 
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
	
	while ($wiersz = mysqli_fetch_array($rezultat2)){ 
		$id2 = $wiersz[0]; 
		$wx1 = $wiersz[1]; 
		$wx2 = $wiersz[2]; 
		$wx3 = $wiersz[3]; 
		$wx4 = $wiersz[4]; 
		$wx5 = $wiersz[5]; 
		$datetime = $wiersz[6]; 
	}
	
    mysqli_close($polaczenie);
	
	/*$kolor = '#B0B0B0';*/
	
    require_once 'phplot.php'; 
	$plot = new PHPlot();
	$plot->SetFailureImage(False); 
	$plot->SetPrintImage(False); 
	$plot->SetImageBorderType('plain');
	$plot->SetPlotType('lines');
	$plot->SetDataType('data-data');
	$plot->SetDataValues($dane);
	$plot->SetTitle('Scada');
	$plot->SetLegend((array('X1','X2','X3','X4','X5')));
	$plot->SetLegendPosition(0, 0, 'world', 0, 0);
	$plot->SetXLabelType('data');
	$plot->SetYLabelType('data');
	$plot->SetDrawXGrid(True);
	$plot->SetDrawYGrid(True);
    $plot->SetMarginsPixels(100);
    $plot->SetLegendPixels(10, 10);
	$plot->SetXTitle("Pomiar"); 
	$plot->SetPrecisionX("0"); 
	$plot->SetHorizTickIncrement("1"); 
	/*$plot->SetBackgroundColor($kolor);*/
	$plot->DrawGraph();
?>

<html lang="pl">
	<head>
		<link href="scada.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body >
		<div id="tablica" style="background: url('img/obraz3.png'); height: 291px; width: 500px; float:left;">
		
			<div id="zmiennaa" style="background-color:lightblue; text-align:center; float: left; width:30px; position: absolute; top: 160px; left: 320px;">
				<?php
					echo $wx1;
				?>
			</div>
			
			<div id="zmiennab" style="background-color:lightgreen; text-align:center; float: left; width: 30px; position: absolute; top: 70px; left: 40px;">
				<?php
					echo $wx2;
				?>
			</div>
			
			<div id="zmiennac" style="background-color:orange; text-align:center; float: left; width: 30px; position: absolute; top: 70px; left: 120px;">
				<?php
					echo $wx3;
				?>
			</div>
			
			<div id="zmiennad" style="background-color:skyblue; text-align:center; float: left; width: 30px; position: absolute; top: 70px; left: 230px;">
				<?php
					echo $wx4;
				?>
			</div>
			
			<div id="zmiennae" style="background-color:red; text-align:center; float: left; width: 30px; position: absolute; top: 70px; left: 320px;">
				<?php
					echo $wx5;
				?>
			</div>
		</div>
		
		<div id="wykres">
			<img src="<?php echo $plot->EncodeImage();?>">
		</div>
	</body>
</html>