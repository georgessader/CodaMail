<!DOCTYPE html>
<html lang="en">
<head><!-- 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="first.css">
<link rel="stylesheet" type="text/css" href="style.css"> -->
<title></title>
	<style type="">
		#popupimg{
			width: 100%;
			position: absolute;
			top: 0px;
			height: 100%;
			left: 0px;
			animation: pup 2.5s forwards;
		}
		@keyframes pup{
			50%{
				opacity: 1;
			}
			100%{
				opacity: 0;
			}
		}
		body{
			background-image: url("OAVJ6006.JPG");
			background-repeat: no-repeat;
			background-size: 100% 100%;
			background-attachment: fixed;
		}
		.top{
			float: right;
			margin-right: 50px;
		}
		form{
			border: 2px solid;
			border-color: rgb(1,11,64);
			width: 30%;
			border-radius: 20px;
			padding: 20px;
			margin: auto;
			margin-top: 50px;
			text-align: center;
			color: white;
		}
		#f1{
			background-image: url(back2.png);
			background-repeat: no-repeat;
			background-size: 100% 100%;
			border: none;
			margin-bottom: 50px;
		}
		.input{
			border: none;
			border-radius: 5px;
			padding: 10px;
			margin: 0px 15px 15px 15px;
			width: 90%;
			background-color: rgb(1,46,108); ;
			color: white;
			border-color: lightblue;
		}
		#sbutton{
			margin: 10px; 
			margin-top: 20px;
			border: solid 1px white;
			border-radius: 30px;
			width: 30%;
			background-color: white;
			padding: 5px 8px;
			font-weight: bolder;
			letter-spacing: 2px;
			
		}
		.logo{
			margin: 0px 0px 0px 20px;
			display: inline;

		}
		a.one:link, a.one:visited{
			color: white;
			font-weight: bold;
			text-decoration: none;
			font-size: 20px ;
			font-weight: bolder;
			padding: 15px;
		}
		a.one:hover{
			background-color: rgb(52,19,90);
			text-decoration: underline;
			text-decoration-color: rgb(1,11,64);
			/*border: 1px solid;
			border-radius: 20px;*/
		}
		.signbutton{
			border: 1px solid;
			display: inline;
			border-color: white;
			border-radius: 20px;
			color: white;
			padding: 5px 20px;
			background: none;
			
		}
		.signbutton:hover{
			background-color: purple;
			color: black;
			border: 1px solid;
			border-color: purple;
			border-radius: 20px;
			font-weight: bold;
		}
		.simg{
			width: 20px;
			height: 20px;
		}
		.head{
			color: white;
			font-weight: bold;
		}
		.icondivs{
			display: flex;
			background-color:none;
		}
		.iconimgs{
			flex: 1;
			height: 40px;
		}
		#content{
			display: none;
		}
		#terms{
			margin-bottom: 20px;
		}

	</style>
</head>
<body>
	<img src="waitimage.jpg" id="popupimg">
<div id="content">
	<div class="logo">
	    Logo
	</div>
	<div class="top">
	  <a href="" class="one">Home</a>
	  <a href="" class="one">Privacy</a>
	  <a href="" class="one">Contact</a>
	  <input type="submit" value="SIGN IN" class="signbutton">
	</div>
	<div class="mdiv">
		<form method="POST" action="Register_back.php" id="f1">
		<h2 class="head">CREATE NEW ACCOUNT</h2>
		<div  class="icondivs">
			<img src="icon5.png" class="iconimgs" >
			<input type="text" name="fName" placeholder="First Name" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon5.png" class="iconimgs" >
			<input type="text" name="lName" placeholder="Last Name" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon4.png" class="iconimgs" >
			<input type="email" name="Email" placeholder="Email" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon4.png" class="iconimgs" >
			<input type="email" name="REmail" placeholder="Recovery Email" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon3.png" class="iconimgs" >
			<input type="password" name="pass" placeholder="Password" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon2.png" class="iconimgs" >
			<input type="password" name="cpass" placeholder="Confirm Password" class="input">
		</div><br>
		<div class="icondivs">
			<img src="calicon.png" class="iconimgs" >
			<input type="date" name="bday" class="input">
		</div><br>
		<div class="icondivs">
			<img src="icon1.png" class="iconimgs" >
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