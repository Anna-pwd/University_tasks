<?php
	session_start();
	
	$opis = $_POST['opis'];
	$adres = $_POST['adres'];
	$cena = $_POST['cena'];
	$typobiektu = $_POST['typobiektu'];
	$idw = $_POST['idw'];
	$data = date("Y-m-d H:i:s");
	echo $idw;
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "SET NAMES 'utf8'");	
	
	mysqli_query($link, "INSERT INTO `oferty` (`idw`, `opis`, `adres`, `idto`, `cena`) VALUES ('$idw', '$opis', '$adres', '$typobiektu', '$cena')") or die ("DB error: $dbname first");
	
	$target_dir = '/home/virtualki/214586/z12/fotki';
	$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]); 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
		echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded.";
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$grafika = $_FILES["fileToUpload"]["name"];
		$grafika2 = "fotki/".$grafika;
		$resultp = mysqli_query($link, "SELECT * FROM `oferty` ORDER BY `data` DESC LIMIT 1") or die ("DB error: sortowanie po dacie");
		while ($row = mysqli_fetch_array($resultp)){
				$ido = $row[0];
		}
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska12"; $dbpassword="1qaz@WSX"; $dbname="db-12";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$result2 = mysqli_query($link, "UPDATE `oferty` SET `fotka`='$grafika' WHERE `ido`='$ido'") or die ("error second");
		header('Location: strona.php');
	}else{ 
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		} 
		echo "Error uploading file."; 
	} 
	header('Location: strona.php');
?>