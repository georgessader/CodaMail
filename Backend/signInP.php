<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Style/input.css">
	<style type="text/css">
		body{
			background-image: url(Images/back.jpg);
			background-repeat: no-repeat;
			background-size: 100% 100%;
			background-attachment: fixed;
		}
		#all{
			display: flex;
			height: 550px;
			border: 2px solid;
			border-color: rgb(12,20,118);
			border-radius:24px;
			margin: 60px 100px 50px 100px;
			background-color: white;
		}
		#div1{
			flex: 1;
			background-image: url(Images/back1.jpg);
			background-repeat: no-repeat;
			background-size: 100% 100%;
			border: 1px ;
			border-top-left-radius: 20px;
			border-bottom-left-radius:20px;
			padding: 120px 120px 0px 120px;
		}
		#div2{
			flex: 1;
			width: 50%;
			padding: 20px;
			margin: 100px;
		}
		#inp-icon2{
			background: url(Images/iconpass.png)no-repeat 100%;
			background-position:1px ;
			background-size: 40px;
			padding: 10px 10px 5px 40px;
			margin: 0px 15px 6px 15px;
			border-bottom: 4px solid rgb(0,99,173);
			border-top-style: none;
			border-left-style: none;
			border-right-style: none;
			color: rgb(1,46,108);
			font-weight: bold;
		}
		#signin{
			border-style: solid;
			border-radius: 8px; 
			width: 50%;
			margin-top: 20px;
			margin-left: 15px;
			background-color: rgb(1,11,64);
			color: white;
			font-size: 20px;
			padding: 15px;
			 
		}
		#sin2{
			margin-left: 15px;
		}
		#acc{
			color: rgb(1,11,64);
			margin-left: 15px;

			font-size: 15px;
			font-style: arial;
			text-decoration: none;
			
		}
		#ca{
			color: rgb(1,11,64);
			margin-left: 50px;
			font-size: 15px;
			font-style: arial;
			text-decoration: none;
		
		}
		#ca:hover{
			text-decoration: underline;
		}
		#wp{
			color: white;
			text-align: center;
			margin-top: 20px;
			margin-right: 20px;
			font-size: 35px;
		}
		#sin1{
			color: white;
			font-size:20px;
			margin-left: 130px;
			margin-top: 30px;

		}
		#logo{
			margin-top: -60px;
		}
		#stat{
			color: rgb(1,11,64);
			margin-left: 30px;
			font-size: 15px;
			font-style: arial;
		}
		#dd{
			width: 90%;
			margin-top: 230px;
			margin-left: 40px;
		}
		@media screen and (max-width: 1000px)
		{
			#sin2{
				margin-left: 0px;
				text-align: center;
			}
			#fd2{
				width: fit-content;
				margin: auto;
			}
			#inp-icon1,#inp-icon2,#signin{
				display: block;
				margin: auto;
				width: 90%;
			}
			#ca{
				margin-left: 0px;			
			}
			#cap{
				text-align: center;		
			}
			#div2{
				width: 100%;
				padding: 0px;
				margin: 0px;
			}
			#all{
				margin: auto;
				height: 570px;
				display: block;
				margin: 80px 30px 0px 30px;
			}
			#fd2{
				width: 80%;
			}

			#wp{
				margin-top: 0px;
				margin-right: 0px;
			}

			#div1{
				margin-top: 0px;
				padding: 0px 0px 0px 0px;	
				border-top-left-radius: 20px;
				border-bottom-left-radius:0px;
				border-top-right-radius: 20px;
				border-bottom-right-radius:0px;
				padding-bottom: 10px;
			}

			#dd{
				width: 100%;
				margin-top: 0px;
				margin-left: 0px;
			}
			#sin1{
				margin-left: 0px;
				margin-top: 50px;
				text-align: center;
			}
			#logo{
				margin-top: 0px;
				width: fit-content;
				display: block;
				margin: auto;
				margin-bottom: 40px;
			}
			#img1{
				margin-top: 10px;
			}
		}

</style>

</head>
<body>
<div id="all">
	<div id="div1">
		<div id="logo">
			<img src="Images/logo.png" width="250px" height="50px" id="img1">
			
		</div>
		<div id="dd">
			<h1 id="wp">WELCOME PAGE</h1>
			<p id="sin1">Sign in <br>to continue to-mail</p>
		</div>
	</div>
	<div id="div2">
		<h1 id="sin2">SIGN IN</h1>
		<form method="POST" action="Login_back.php" id="fd2">
			<p><input type="email" name="email" placeholder="Email" id="inp-icon1"></p>
			<p><input type="password" name="pass"  placeholder="Password" id="inp-icon2"></p>
			<p><input type="submit" name="SIGN In" value="SIGN IN" id="signin"></p>
		</form>
		<p id="cap"><a href="form.php" id="ca"><b>Create Acount</b></a></p>
		<?php
			if(isset($_GET['status']))
		{
			echo "<p id='stat'>".$_GET['status']."</p>";
		}

		?>	
	</div>
</div>
</body>
</html>