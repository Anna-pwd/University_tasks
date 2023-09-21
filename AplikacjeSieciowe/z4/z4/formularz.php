<html>
	<head>
		<title>Bagniewska</title>
	</head>
	<body>
		<form method="POST" action="add.php"><br>
			x1:<input type="number" name="x1" min="-50" max="100" required><br>
			x2:<input type="number" name="x2" min="-50" max="100" required><br>
			x3:<input type="number" name="x3" min="-50" max="100" required><br>
			x4:<input type="number" name="x4" min="-50" max="100" required><br>
			x5:<input type="number" name="x5" min="-50" max="100" required><br><br>

			Pożar: 
			<select id="fire" name="fire">
				<option value=1>Tak</option>
				<option value=0 selected>Nie</option>
			</select>
			<br><br>
			
			Zalanie:
			<select id="water" name="water">
				<option value=1>Tak</option>
				<option value=0 selected>Nie</option>
			</select>
			<br><br>
			
			Włamanie:
			<select id="breakin" name="breakin">
				<option value=1>Tak</option>
				<option value=0 selected>Nie</option>
			</select>
			<br><br>
			
			Czujnik CO:
			<select id="alertgas" name="alertgas">
				<option value=1>Tak</option>
				<option value=0 selected>Nie</option>
			</select>
			<br><br>

			Wentylacja:
			<select id="air" name="air">
				<option value=2>Włączona - stopień 2</option>
				<option value=1>Włączona - stopień 1</option>
				<option value=0 selected>Wyłączona</option>
			</select>
		
			<input type="submit" value="Send"/></form>
		</form>
	</body>
</html>
