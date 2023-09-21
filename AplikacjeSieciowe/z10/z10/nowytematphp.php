<?php
	session_start();
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska10"; $dbpassword="1qaz@WSX"; $dbname="db-10";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);		
	mysqli_query($link, "SET NAMES 'utf8'");				
	if(!$link){ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
	}
		
	$login = $_SESSION['login'];
	$idt = $_POST['temat'];
	$nazwa = $_POST['nazwatematu'];
	
	if($idt != ''){
		mysqli_query($link, "DELETE FROM `tematy` WHERE `idt`='$idt'");
		mysqli_query($link, "DELETE FROM `posty` WHERE `idt`='$idt'");		
	}
	if($nazwa != ''){
		mysqli_query($link, "INSERT INTO `tematy` (`temat`, `autor`) VALUES ('$nazwa', '$login')");
	}
	header('Location: forum.php');
?>
