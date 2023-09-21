<?php 
	session_start();
	$idu = $_SESSION['idu'];
	$nazwapl = $_POST['nazwapl'];
	$ids = $_POST['song'];
	$public = $_POST['public'];

	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska14"; $dbpassword="1qaz@WSX"; $dbname="db-14";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	mysqli_query($link, "SET NAMES 'utf8'");   
	
	$resultpl = mysqli_query($link, "SELECT * FROM `playlistname` WHERE (`idu`='$idu' AND `name`='$nazwapl')");
	$ile = mysqli_num_rows($resultpl);
	if($ile > 0){
		$row = mysqli_fetch_array($resultpl);
		$idpl = $row['idpl'];
		mysqli_query($link, "INSERT INTO `playlistdatabase` (`idpl`, `ids`) VALUES ('$idpl', '$ids')") or die ("DB error: $dbname dodawanie piosenki1");
		mysqli_query($link, "UPDATE `playlistname` SET `public`='$public' WHERE `idpl`='$idpl'");
		echo '1';
	}else{
		$resultnew = mysqli_query($link, "INSERT INTO `playlistname` (`idu`, `name`, `public`) VALUES ('$idu', '$nazwapl', '$public')")or die ("DB error: $dbname dodawanie playlisty"); 
		$sprawdz = mysqli_query($link, "SELECT * FROM `playlistname` WHERE (`idu`='$idu' AND `name`='$nazwapl')")or die ("DB error: $dbname sprawdzanie piosenki");
		$wiersz = mysqli_fetch_array($sprawdz);
		$idpl = $wiersz['idpl'];
		$resultup = mysqli_query($link, "INSERT INTO `playlistdatabase` (`idpl`, `ids`) VALUES ('$idpl', '$ids')")or die ("DB error: $dbname dodawanie piosenki2");
		echo '2';
	}		
	header('Location: strona.php');
?>
