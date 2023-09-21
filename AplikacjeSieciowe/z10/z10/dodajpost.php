<?php
	session_start();
	
	$login = $_POST['login'];
	$tresc = $_POST['tresc'];
	$idt = $_POST['idt'];
	
	if(preg_match('/.holera/', $tresc)){
		$ban = 1;
	}else{
		$ban = 0;
	}
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	mysqli_query($link, "SET NAMES 'utf8'");	
	
	mysqli_query($link, "INSERT INTO `posty` (`idt`, `tresc`, `autor`, `ban`) VALUES ('$idt', '$tresc', '$login', '$ban')") or die ("DB error: $dbname posty");
	
	$target_dir = '/home/virtualki/214586/z10/obrazki';
	$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]); 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
		echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded.";
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$grafika = $_FILES["fileToUpload"]["name"];
		//$grafika2 = "obrazki/".$grafika;
		$resultp = mysqli_query($link, "SELECT * FROM `posty` ORDER BY `idp` DESC LIMIT 1") or die ("DB error: sortowanie idp");
		while ($row = mysqli_fetch_array($resultp)){
				$idp = $row[0];
		}
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$result2 = mysqli_query($link, "UPDATE `posty` SET `obrazek`='$grafika' WHERE `idp`='$idp'") or die ("error second");
		$_SESSION['idt'] = $idt;
		header('Location: tematy.php');
	}else{ 
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		} 
		echo "Error uploading file."; 
	} 
	$_SESSION['idt'] = $idt;
	header('Location: tematy.php');
?>