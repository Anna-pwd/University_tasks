<?php 
	session_start();
	

	$target_dir = '/home/virtualki/214586/z8/';
	$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]); 
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){ 
		echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded.";
		$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska8"; $dbpassword="1qaz@WSX"; $dbname="db-8";
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		$nazwa = $_FILES["fileToUpload"]["name"];
		$result = mysqli_query($link, "UPDATE `cms` SET `logo_file`='$nazwa' WHERE `id_cms`='1'") or die ("logi nieudane");
		header('Location: logo.php');
	}else{ 
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		} 
		echo "Error uploading file."; 
	} 
	header('Location: logo.php');
?>