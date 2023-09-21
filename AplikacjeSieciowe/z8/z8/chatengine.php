<?php
	session_start();
	
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska8"; $dbpassword="1qaz@WSX"; $dbname="db-8";
	$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	$result = mysqli_query($link, "SELECT * FROM `cms` WHERE `id_cms`='1'");
	$rekord = mysqli_fetch_array($result);
	$logo = $rekord['logo_file'];
	$ofirmie = $rekord['about_company'];
	$kontakt = $rekord['contact'];
	$linkmaps = $rekord['google_map_link'];
	$oferta = $rekord['oferta'];

	$rozmowa = $_POST['rozmowa'];
	if((preg_match('/.ze../', $rozmowa)) || (preg_match('/.ita./', $rozmowa)) || (preg_match('/^.ejka/', $rozmowa)) || (preg_match('/.zie...obry/', $rozmowa)) || (preg_match('/.iema/', $rozmowa)) ){
		$odpowiedz = "Witam Szanownego Klienta";
	}else{}	
				
	if((preg_match('/.ontakt/', $rozmowa)) || (preg_match('/.dres/', $rozmowa)) || (preg_match('/.elefon/', $rozmowa))){
		$odpowiedz = $kontakt;
	}else{}
					
	if(preg_match('/.ferta/', $rozmowa)){
		$odpowiedz = $oferta;
	}else{}
					
	if(preg_match('/^[?|h|H]$/', $rozmowa)) {
		$odpowiedz = "Polecenia które możesz użyć: ?/h/oferta/kontakt/adres/telefon/witaj";
	}else{}
				
	if($odpowiedz == ""){
		$ktore = rand (1, 10);
		if($ktore == 1){
			$odpowiedz = "Jestem tylko początkującym botem i nie znam odpowiedzi na to pytanie.";
		}else{}
		if($ktore == 2){
			$odpowiedz = "Zostaw mnie, ja nic więcej nie wiem.";
		}else{}
		if($ktore == 3){
			$odpowiedz = "Mydłem! Dobijemy go mydłem!";
		}else{}
		if($ktore == 4){
			$odpowiedz = "Czajnik na wrotkę i za nim!";
		}else{}
		if($ktore == 5){
			$odpowiedz = "Ja - ludź, Ty - ludź, My - człowieki.";
		}else{}
		if($ktore == 6){
			$odpowiedz = "How much wood would a woodchuck chuck if a woodchuck could chuck wood?";
		}else{}
		if($ktore == 7){
			$odpowiedz = "Możesz powtórzyć głośniej?";
		}else{}
		if($ktore == 8){
			$odpowiedz = "Też się bałem ciemności, aż pewnego... Chociaż nie. Ja wciąż się boję ciemności.";
		}else{}
		if($ktore == 9){
			$odpowiedz = "Niebieski kwiat i kolce. Niebieski kwiat i kolce...";
		}else{}
		if($ktore == 10){
			$odpowiedz = "10 punktów dla Gryffindoru!";
		}else{}
	}
	$data = date("Y-m-d H:i:s");
	mysqli_query($link, "INSERT INTO `chatbot` (`datetime`) VALUES ('$data')");
	mysqli_query($link, "UPDATE `chatbot` SET `question`='$rozmowa' WHERE `datetime`='$data'");
	mysqli_query($link, "UPDATE `chatbot` SET `answer`='$odpowiedz' WHERE `datetime`='$data'");
	$_SESSION['data']=$data;
	header('Location: chat.php');
?>