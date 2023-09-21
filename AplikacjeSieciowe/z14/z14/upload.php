<?php 
	session_start();
	$idu = $_SESSION['idu'];
	$title = $_POST['title'];
	$musician = $_POST['musician'];
	$lyrics = $_POST['lyrics'];
	$idmt = $_POST['idmt'];	

	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska14"; $dbpassword="1qaz@WSX"; $dbname="db-14";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	mysqli_query($link, "SET NAMES 'utf8'");   
	mysqli_query($link, "INSERT INTO `song` (`title`, `musician`, `idu`, `lyrics`, `idmt`) VALUES ('$title', '$musician', '$idu', '$lyrics', '$idmt')") or die ("DB error: $dbname dodawanie piosenki");
	
	$target_dir = "/home/virtualki/214586/z14/songs";
	$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]); 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
		echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded."; 		
	}else{ 
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		} 
		echo "Error uploading file."; 
	} 
	$fnv = $_FILES["fileToUpload"]["name"];
	$filenamevar = "/z14/songs/".$fnv."";
	
	echo $filenamevar;
	
	$resultfn = mysqli_query($link, "SELECT * FROM `song` ORDER BY `datetime` DESC LIMIT 1") or die ("DB error: sortowanie po dacie");
		while ($row = mysqli_fetch_array($resultfn)){
			$ids = $row[0];
		}
	
	mysqli_query($link, "UPDATE `song` SET `filename`='$filenamevar' WHERE `ids`='$ids'") or die ("error nazwa pliku");
		header('Location: strona.php');
		
	header('Location: strona.php');
?>
