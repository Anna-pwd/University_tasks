<form method="POST" action="add.php"><br>
	Nick:<input id="name" type="text"	 name="user" maxlength="10" size="10"><br>
	Post:<input type="text" name="post" maxlength="90" size="90"><br>
	<input type="submit" value="Send"/>
</form>
		
<!--		<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  
    <!-- jQuery code to show the working of this method -->
 <!--   <script>
        $(document).ready(function() {
            $("button").click(function() {
                $(document).scrollTop($(document).height());
            });
        });
    </script>
		<button style="background-color:red;">Scroll!</button> -->
<?php  
	$dbhost="mysql01.abagniewska.beep.pl"; $dbuser="abagniewska3"; $dbpassword="1qaz@WSX"; $dbname="db-3";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
	if (!$connection)
	{
		echo " MySQL Connection error." . PHP_EOL;
		echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	$result = mysqli_query($connection, "Select * from messages ORDER BY datetime ASC") or die ("DB error: $dbname idex.php");
	print "<TABLE CELLPADDING=5 BORDER=1 style='display:block; width:930; height:300px; overflow-y:auto'>";
	print "<TR><TD>id</TD><TD>Date/Time</TD><TD>User</TD><TD>Message</TD></TR>\n";
	while ($row = mysqli_fetch_array ($result))
	{
		$id = $row[0];
		$date = $row[1];
		$message= $row[2];
		$user = $row[3];
		$color_db = mysqli_query($connection, "SELECT color FROM colors WHERE user='$user'");
		$color="";
		while($row_color = mysqli_fetch_array($color_db)){
			$color = $row_color[0];
		}
			if($color==""){
				$color = dechex(mt_rand(0x000000, 0xDDFFFF));
				mysqli_query($connection, "INSERT INTO colors (user, color) VALUES ('$user', '$color')");
			}
		
		print "<TR><TD style='width:auto;'>$id</TD><TD style='width:auto'>$date</TD><TD style='color:#$color;'>$user</TD><TD style='width:auto; color:#$color;''>$message</TD></TR>\n";
	}
	print "</TABLE>";
	mysqli_close($connection);
?>

<html>
<head>
<title>Bagniewska</title>
</head>
<!--<body onload="">
<footer id="foot">
</footer> -->
</body>
</html>


		
