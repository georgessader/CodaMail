<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Style/form.css">
<title></title>
</head>
<body>
	<img src="Images/waitimage.jpg" id="popupimg">
<div id="content">
	<div class="logo">
	    <img src="Images/logo 22.png" width="250px" height="50px" id='logoImage'>
	</div>
	<div class="top">
		<a href="" class="one">Home</a>
		<a href="" class="one">Privacy</a>
		<a href="" class="one">Contact</a>
		<a href="signInP.php" id='signLink'>
			<input type="submit" value="SIGN IN" class="signbutton">
		</a>
	</div>
	<div class="mdiv">
		<form method="POST" action="Register_back.php" id="f1">
		<h2 class="head">CREATE NEW ACCOUNT</h2>
		<div  class="icondivs">
			<img src="Images/icon5.png" class="iconimgs" >
			<input type="text" name="fName" placeholder="First Name" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon5.png" class="iconimgs" >
			<input type="text" name="lName" placeholder="Last Name" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon4.png" class="iconimgs" >
			<input type="email" name="Email" placeholder="Email" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon4.png" class="iconimgs" >
			<input type="email" name="REmail" placeholder="Recovery Email" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon3.png" class="iconimgs" >
			<input type="password" name="pass" placeholder="Password" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon2.png" class="iconimgs" >
			<input type="password" name="cpass" placeholder="Confirm Password" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/calicon.png" class="iconimgs" >
			<input type="date" name="bday" class="input">
		</div><br>
		<div class="icondivs">
			<img src="Images/icon1.png" class="iconimgs" >
			<input type="number" name="nb" placeholder="Phone Number"  class="input">
		</div><br>
		<input id='terms' type="radio" name="agreament" required>*I agree to the Terms</label><br>
		<?php

			if(isset($_GET['status']))
			{
				echo "<div>".$_GET['status']."</div>";
			}

		?>
		<input type="submit" value="REGISTER"  id="sbutton">
		
	</form>
	</div>
</div>
</body>
	<script>
	setTimeout(function(){
	 	document.getElementById('popupimg').style.display="none";
	 	document.getElementById('content').style.display="block";
	},2500);
	</script>
</html>