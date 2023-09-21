<?php
	session_start();
	

	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska8"; $dbpassword="1qaz@WSX"; $dbname="db-8";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			
	$ofirmie = $_POST['ofirmie'];
	$linkmaps = $_POST['linkmaps'];
	$kontakt = $_POST['kontakt'];
	$oferta = $_POST['oferta'];	
	
	if($ofirmie != ''){
		mysqli_query($link, "UPDATE `cms` SET `about_company`='$ofirmie' WHERE `id_cms`='1'") or die ("logi nieudane");
		header('Location: index.php');
	}else{
	}
	
	if($linkmaps != ''){
		mysqli_query($link, "UPDATE `cms` SET `google_map_link`='$linkmaps' WHERE `id_cms`='1'") or die ("logi nieudane");
		header('Location: dojazd.php');
	}else{
	}

	if($kontakt != ''){
		mysqli_query($link, "UPDATE `cms` SET `contact`='$kontakt' WHERE `id_cms`='1'") or die ("logi nieudane");
		header('Location: kontakt.php');
	}else{
	}

	if($oferta != ''){
		mysqli_query($link, "UPDATE `cms` SET `oferta`='$oferta' WHERE `id_cms`='1'") or die ("logi nieudane");
		header('Location: oferta.php');
	}else{
	}	
	
?>
