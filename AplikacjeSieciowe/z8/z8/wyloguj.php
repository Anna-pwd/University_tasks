<?php
	/*aby zadziałała sesja, nie ma 'close'*/
	session_start();

	/*usunięcie sesji*/
	session_unset();
	
	/*przekierowanie na stronę główną*/
	header('Location: index.php');

?>