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

    require_once 'phplot.php'; 
	$plot = new PHPlot();
	$plot->SetFailureImage(False); // No error images
	$plot->SetPrintImage(False); // No automatic output
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
	$plot->DrawGraph();
	
	$checkair = mysqli_query($polaczenie, "SELECT stan FROM wskazniki WHERE id=1");
	$stanair = mysqli_fetch_array($checkair);
	$checkgas = mysqli_query($polaczenie, "SELECT stan FROM wskazniki WHERE id=2"); 
	$stangas = mysqli_fetch_array($checkgas);
	$checkbreak = mysqli_query($polaczenie, "SELECT stan FROM wskazniki WHERE id=3"); 
	$stanbreak = mysqli_fetch_array($checkbreak);
	$checkfire = mysqli_query($polaczenie, "SELECT stan FROM wskazniki WHERE id=4"); 
	$stanfire = mysqli_fetch_array($checkfire);
	$checkwater = mysqli_query($polaczenie, "SELECT stan FROM wskazniki WHERE id=5"); 
	$stanwater = mysqli_fetch_array($checkwater);
	
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
?>

<html lang="pl">
	<head>
		<link href="scada.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title>Bagniewska</title>
	</head>
	<body >
		<div id="tablica" style="background: url('img/obraz3.png'); height: 291px; width: 500px;">
		
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
		
		<div style="clear:both;"></div>
		
		<div id="wentylacja" style="float: left;">Wentylacja:
			<img src="<?php
				if ($stanair[0]==0){
					echo 'img/air0.png';
				}
				if ($stanair[0]==1){
					echo 'img/air12.gif';
				}
				if($stanair[0]==2){
					echo 'img/air1.gif';
				}
			?>" width=150 height=150>		
		</div>
		
		<div id="co" style="float: left;">Czujnik CO:
			<img src="<?php
				if ($stangas[0]==0){
					echo 'img/co.jpg';
				}
				if ($stangas[0]==1){
					echo 'img/coalert.gif';
				}
			?>" width=150 height=150>
		</div>
		
		<div id="wlamanie" style="float: left;">Włamanie:
			<img src="<?php
				if ($stanbreak[0]==0){
					echo 'img/closed.png';
				}
				if ($stanbreak[0]==1){
					echo 'img/open.png';
				}
			?>" width=150 height=150>
		</div>
		
		<div id="gasnica" style="float: left;">Pożar:
			<img src="<?php
				if ($stanfire[0]==0){
					echo 'img/gasnica.png';
				}
				if ($stanfire[0]==1){
					echo 'img/fire.gif';
				}
			?>" width=150 height=150>
		</div>
		
		<div id="zalanie" style="float: left;">Zalanie:
			<img src="<?php
				if ($stanwater[0]==0){
					echo 'img/woda.jpg';
				}
				if ($stanwater[0]==1){
					echo 'img/fala.gif';
				}
			?>" width=150 height=150>
		</div>
	</body>
</html>
