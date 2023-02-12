<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method='POST' action='Login_back.php'>
		<input type="text" name="email">
		<input type="password" name="password">
		<input type="submit">
	</form>
	<?php

		if(isset($_GET['status']))
		{
			echo $_GET['status'];
		}

	?>
</body>
</html>