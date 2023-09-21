<?php
	session_start();
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	
	$title = $_POST['title'];
	$tresc = $_POST['tresc'];
	$autor = $_SESSION['nazwisko'];
	
	$result = mysqli_query($link, "INSERT INTO `lekcje` (`title`, `tresc`, `autor`) VALUES ('$title', '$tresc', '$autor')");
	
	$target_dir = '/home/virtualki/214586/z9/';
	$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]); 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
		echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded.";
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska9"; $dbpassword="1qaz@WSX"; $dbname="db-9";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$grafika = $_FILES["fileToUpload"]["name"];
		$result2 = mysqli_query($link, "UPDATE `lekcje` SET `grafika`='$grafika' WHERE `title`='$title'") or die ("logi nieudane");
		header('Location: stronaszkoleniowiec.php');
	}else{ 
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		} 
		echo "Error uploading file."; 
	} 
	header('Location: stronaszkoleniowiec.php');
?>
