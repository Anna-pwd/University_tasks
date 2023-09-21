
<form method="POST" action="add.php"><br>
	Nick:<input type="text" 
	<?php
	if(isset($_COOKIE['nick'])){
		echo 'value="'.$_COOKIE['nick'].'"';
	}
	?>
	name="user" maxlength="10" size="10"><br>
	Post:<input type="text" name="post" maxlength="90" size="90"><br>
	<input type="submit" value="Send"/>
</form>
Posts: <br>
<?php 
include ("conversation.txt");
 ?> <br>

<html>
<head>
<title>Bagniewska</title>
</head>