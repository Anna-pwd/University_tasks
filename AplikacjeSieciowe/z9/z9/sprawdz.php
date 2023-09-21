<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

		<title>Bagniewska</title>
	</head>

	<body>
	<?php 
		require("tfpdf/tfpdf.php");
		session_start();
		if (!isset($_SESSION['loggedin'])){
			header('Location: index.php');
		}
		
		$login = $_SESSION['nazwisko'];
		
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		
		$idt = $_SESSION['wyswietl'];
		$inum = $_SESSION['i'];
		
		$result = mysqli_query($link, "SELECT * FROM `test` WHERE `idt` = '$idt'");
		$rekord = mysqli_fetch_array($result);
		$nazwa = $rekord['nazwa'];
		$szkoleniowiec = $rekord['szkoleniowiec'];

		$ok = 0;
		$data = date("Y-m-d H:i:s");

		$info0 = "Id testu: " . "$idt" . ", Nazwa testu: " . "$nazwa";
		$info1 = "Szkoleniowiec: " . "$szkoleniowiec";
		$info2 =  "Kursant: " . "$login";
		$info3 = "Data: " . "$data";

		ob_end_clean();
		$pdf = new tFPDF();
		$pdf->AddPage();
		$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
		$pdf->AddFont('DejaVu','B','DejaVuSansCondensed-Bold.ttf',true);
		$pdf->SetFont('DejaVu','B',11);

		$pdf->Cell(20, 8, $info0);
		$pdf->Ln(8);
		$pdf->Cell(20, 8, $info1);
		$pdf->Ln(8);
		$pdf->Cell(20, 8, $info2);
		$pdf->Ln(8);
		$pdf->Cell(20, 8, $info3);
		$pdf->Ln(8);

		for($i =1; $i < $inum; $i++){
		
			if($_POST['idq'.$i.'']){
				$idq = $_POST['idq'.$i.''];
				
				$result = mysqli_query($link, "SELECT * FROM `pytanie` WHERE `idq` = '$idq'");
				$rekord = mysqli_fetch_array($result);
				$trescpytania = $rekord['tresc_pytania'];
				
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetFont('DejaVu', 'B', 9);
				$pdf->Ln(8);
				$pdf->Cell(20, 8, 'Pytanie '.$i.': ');
				$pdf->Ln(8);

				$pdf->Cell(20, 8, $trescpytania);
				$pdf->Ln(8);
				$pdf->SetFont('DejaVu', '', 9);
				$result = mysqli_query($link, "SELECT * FROM `pytanie` WHERE `idq` = '$idq'");
				$rekord = mysqli_fetch_array($result);
				$poprawna = $rekord['poprawna'];
				$odpa = $rekord['odp_a'];
				$odpb = $rekord['odp_b'];
				$odpc = $rekord['odp_c'];
				$odpd = $rekord['odp_d'];
				
				//odp A
				if($_POST['odpa'.$idq.'']){
					$odp = $_POST['odpa'.$idq.''];
					$odpowiedza = 'Odp.A: '.$odpa.'.';
					if($odp == $poprawna){
						$ok++;				
						$pdf->SetTextColor(0, 255, 0);
						$pdf->Cell(20, 8, $odpowiedza);
						$pdf->Ln(8);
					}else{
						$pdf->SetTextColor(255, 0, 0);
						$pdf->Cell(20, 8, $odpowiedza);
						$pdf->Ln(8);
					}
				}else{
					$odpowiedza = 'Odp.A: '.$odpa.'.';
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(20, 8, $odpowiedza);
					$pdf->Ln(8);
				}
											
				//odp B
				if($_POST['odpb'.$idq.'']){
					$odp = $_POST['odpb'.$idq.''];
					$odpowiedzb = 'Odp.B: '.$odpb.'.';
					if($odp == $poprawna){
						$ok++;				
						$pdf->SetTextColor(0, 255, 0);
						$pdf->Cell(20, 8, $odpowiedzb);
						$pdf->Ln(8);
					}else{
						$pdf->SetTextColor(255, 0, 0);
						$pdf->Cell(20, 8, $odpowiedzb);
						$pdf->Ln(8);
					}
				}else{
					$odpowiedzb = 'Odp.B: '.$odpb.'.';
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(20, 8, $odpowiedzb);
					$pdf->Ln(8);
				}
				
				//odp C
				if($_POST['odpc'.$idq.'']){
					$odp = $_POST['odpc'.$idq.''];
					$odpowiedzc = 'Odp.C: '.$odpc.'.';
					if($odp == $poprawna){
						$ok++;					
						$pdf->SetTextColor(0, 255, 0);
						$pdf->Cell(20, 8, $odpowiedzc);
						$pdf->Ln(8);
					}else{
						$pdf->SetTextColor(255, 0, 0);
						$pdf->Cell(20, 8, $odpowiedzc);
						$pdf->Ln(8);
					}
				}else{
					$odpowiedzc = 'Odp.C: '.$odpc.'.';
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(20, 8, $odpowiedzc);
					$pdf->Ln(8);
				}
				
				//odp D
				if($_POST['odpd'.$idq.'']){
					$odp = $_POST['odpd'.$idq.''];
					$odpowiedzd = 'Odp.D: '.$odpd.'.';
					if($odp == $poprawna){
						$ok++;					
						$pdf->SetTextColor(0, 255, 0);
						$pdf->Cell(20, 8, $odpowiedzd);
						$pdf->Ln(8);
					}else{
						$pdf->SetTextColor(255, 0, 0);
						$pdf->Cell(20, 8, $odpowiedzd);
						$pdf->Ln(8);
					}
				}else{
					$odpowiedzd = 'Odp.D: '.$odpd.'.';
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Cell(20, 8, $odpowiedzd);
					$pdf->Ln(8);
				}
			}
		}
		$inum--;
		$wynik = $ok;
		$rezultat = ''.$ok.'/'.$inum.'';

		if(mysqli_num_rows(mysqli_query($link, "SELECT * FROM `wyniki` WHERE ((`pracownik` = '$login') AND (`nazwatestu` = '$nazwa'))"))==0){
			mysqli_query($link, "INSERT INTO `wyniki` (`nazwatestu`, `pracownik`, `wynik`, `iloscprob`, `data`) VALUES ('$nazwa', '$login', '$rezultat', '1', '$data')");
			
			$result = mysqli_query($link, "SELECT * FROM `pracownicy` WHERE `login` = '$login'");
			$rekord = mysqli_fetch_array($result);
			$iloscprob = $rekord['podejscdotestu'] + 1;
			mysqli_query($link, "UPDATE `pracownicy` SET `podejscdotestu`='$iloscprob' WHERE `login` = '$login'");

		}else{
			$result = mysqli_query($link, "SELECT * FROM `wyniki` WHERE ((`pracownik` = '$login') AND (`nazwatestu` = '$nazwa'))");
			$rekord = mysqli_fetch_array($result);
			$iloscprob = $rekord['iloscprob'] + 1;
			mysqli_query($link, "UPDATE `wyniki` SET `iloscprob`='$iloscprob' WHERE ((`pracownik` = '$login') AND (`nazwatestu` = '$nazwa'))");
			mysqli_query($link, "UPDATE `wyniki` SET `wynik`='$rezultat' WHERE ((`pracownik` = '$login') AND (`nazwatestu` = '$nazwa'))");
			mysqli_query($link, "UPDATE `wyniki` SET `data`='$data' WHERE ((`pracownik` = '$login') AND (`nazwatestu` = '$nazwa'))");

			$result2 = mysqli_query($link, "SELECT * FROM `pracownicy` WHERE `login` = '$login'");
			$rekord2 = mysqli_fetch_array($result2);
			$iloscprob = $rekord2['podejscdotestu'] + 1;
			mysqli_query($link, "UPDATE `pracownicy` SET `podejscdotestu`='$iloscprob' WHERE `login` = '$login'");
		}

		$pdf->SetFont('DejaVu', 'B', 11);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln(8);
		$pdf->Cell(20, 8, 'Wynik: '.$wynik.'/'.$inum.'.');
		$pdf->Ln(8);
		$pdf->Output("", $login);
	?>
	</body>
</html>