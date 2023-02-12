<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="Style/Mailpage.css">
</head>
<body>

<?php
	include 'connect.php';
	session_start();
	$s = "select id,firstName,lastName,Email from users where id=".$_SESSION['id'];

	$inbox = "select id, senderFName, senderLName, subject, emailBody, sendDate from emails where recieverId=".$_SESSION['id']." and status='normal' ORDER BY sendDate desc";

	$sent = "select recieverFName, recieverLName, subject, emailBody, sendDate from emails where senderId=".$_SESSION['id']." and status='normal' ORDER BY sendDate desc"; 

	$trash = "select id, senderFName, senderLName, subject, emailBody, sendDate from emails where recieverId=".$_SESSION['id']." and status='trashed' ORDER BY sendDate desc";

	$archive = "select id, senderFName, senderLName, subject, emailBody, sendDate from emails where recieverId=".$_SESSION['id']." and status='archived' ORDER BY sendDate desc";

	if($r=$connection->query($s))
	{
		while($rows=$r->fetch_assoc())
		{
			echo "<div id=Alld>
					<div id='Mdiv'>
						<div id='submain'>
							<a onclick='compose()'>
							<div class='p1' id='div1'>
								<img class='imgA' src='Images/pencil.png'>
								<p class='pdiv' id='comp'>Compose</p>
							</div>
							</a>
							<h2 class='name'>".$rows['firstName']."<br> ".$rows['lastName']."</h2>
						</div>
						<div class='p1'>
							<img class='img'  src='Images/message.png'>
							<p class='pdiv'>conversation</p>
						</div>
						<div class='p1' onclick='inbox()'>
							<img class='img'  src='Images/inbox.png'>
							<p class='pdiv'>inbox</p>
						</div>
						<div class='p1' onclick='sent()'>
							<img class='img'  src='Images/email.png'>
							<p class='pdiv'>sent items</p>
						</div>
						<div class='p1'>
							<img class='img'  src='Images/paper-stationery-with-silhouette.png'>
							<p class='pdiv'>drafts</p>
						</div>
						<hr class='underline'>
						<div class='p1' onclick='archive()'>
							<img class='img'  src='Images/verified.png'>
							<p class='pdiv'>archive</p>
						</div>
						<div class='p1'>
							<img class='img'  src='Images/poison.png'>
							<p class='pdiv'>spam</p>
						</div>
						<div class='p1' onclick='trash()'>
							<img class='img'  src='Images/delete.png'>
							<p class='pdiv'>trash</p>
						</div>
					</div>

					<div id='maindiv'> 
						<div class='divB'>
							<div class='rdiv'>
								<img src='Images/logo 2.png' class='img1'>
							</div>
						</div>";
						$c = 0;
						if($Inbox=$connection->query($inbox))
						{
							while($emails=$Inbox->fetch_assoc())
							{
								$c++;
								echo "<div class='p2'>
										<div class='pp' onclick=emailDisplay('n".$c."')>
											<div class='p21'>
												<img src='Images/img.png' class='img2'>
											</div>
											<div class='p22 m5'>
												<p><b>".$emails['senderFName']." ".$emails['senderLName']."</b></p>
											</div>
											<div class='p23 m5'>	
												<p><b>Subject: </b>".$emails['subject']."</p>
												<div id='n".$c."' style='display:none'>
													<p><b>Email: </b>".$emails['emailBody']."</p>
												</div>
											</div>
										</div>
										<div class='p24 m5'>
											<form method='POST' action='trash.php' onclick='alertTrash()'>
												<input type='text' value='".encrypt($emails['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to move this email to trash bin?\")'><img src='Images/delete.png' class='img4' title='Move to trash bin'></button>
											</form>
											<form method='POST' action='archive.php' onclick='alertArchive()'>
												<input type='text' value='".encrypt($emails['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to move this email to archive?\")'><img src='Images/verified.png' class='img5' title='Move to archive'></button>
											</form>
										</div>
										<div class='p25 m5'>
											<p>".$emails['sendDate']."</p>
										</div>
									</div>";
							}
						}

						echo "</div>";

					echo "<div id='sentdiv'> 
							<div class='divB'>
								<div class='rdiv'>
									<img src='Images/logo 2.png' class='img1'>
								</div>
							</div>";
						$d = 0;
						if($Sent=$connection->query($sent))
						{
							while($mails=$Sent->fetch_assoc())
							{
								$d++;
								echo "<div class='p2' onclick=emailDisplay('m".$d."')>
											<div class='p21'>
												<img src='Images/img.png' class='img2'>
											</div>
											<div class='p22 m5'>
												<p><b>To: ".$mails['recieverFName']." ".$mails['recieverLName']."</b></p>
											</div>
											<div class='p23 m5'>	
												<p><b>Subject: </b>".$mails['subject']."</p>
												<div id='m".$d."' style='display:none'>
													<p><b>Email: </b>".$mails['emailBody']."</p>
												</div>
											</div>
											<div class='p24 m5'>
												<p>".$mails['sendDate']."</p>
											</div>
										</div>";
							}
						}

						echo "</div>";

						echo "<div id='trashdiv'> 
								<div class='divB'>
									<div class='rdiv'>
										<img src='Images/logo 2.png' class='img1'>
									</div>
								</div>";
						$t = 0;
						if($Trash=$connection->query($trash))
						{
							while($bin=$Trash->fetch_assoc())
							{
								$t++;
								echo "<div class='p2'>
										<div class='pp' onclick=emailDisplay('t".$t."')>
											<div class='p21'>
												<img src='Images/img.png' class='img2'>
											</div>
											<div class='p22 m5'>
												<p><b>".$bin['senderFName']." ".$bin['senderLName']."</b></p>
											</div>
											<div class='p23 m5'>	
												<p><b>Subject: </b>".$bin['subject']."</p>
												<div id='t".$t."' style='display:none'>
													<p><b>Email: </b>".$bin['emailBody']."</p>
												</div>
											</div>
										</div>
										<div class='p24 m5'>
											<form method='POST' action='inbox.php'>
												<input type='text' value='".encrypt($bin['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to remove this email from trash?\")'><img src='Images/inbox.png' class='img4' title='Remove from trash'></button>
											</form>
											<form method='POST' action='delete.php'>
												<input type='text' value='".encrypt($bin['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to delete this email permenantly?\")'><img src='Images/delete.png' class='img5' title='Delete'></button>
											</form>
										</div>
										<div class='p25 m5'>
											<p>".$bin['sendDate']."</p>
										</div>
									</div>";
							}
						}

						echo "</div>";


						echo "<div id='archivediv'> 
								<div class='divB'>
									<div class='rdiv'>
										<img src='Images/logo 2.png' class='img1'>
									</div>
								</div>";
						$a = 0;
						if($Archive=$connection->query($archive))
						{
							while($hide=$Archive->fetch_assoc())
							{
								$a++;
								echo "<div class='p2'>
										<div class='pp' onclick=emailDisplay('a".$a."')>
											<div class='p21'>
												<img src='Images/img.png' class='img2'>
											</div>
											<div class='p22 m5'>
												<p><b>".$hide['senderFName']." ".$hide['senderLName']."</b></p>
											</div>
											<div class='p23 m5'>	
												<p><b>Subject: </b>".$hide['subject']."</p>
												<div id='a".$a."' style='display:none'>
													<p><b>Email: </b>".$hide['emailBody']."</p>
												</div>
											</div>
										</div>
										<div class='p24 m5'>
											<form method='POST' action='inbox.php'>
												<input type='text' value='".encrypt($hide['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to unarchive this email?\")'><img src='Images/inbox.png' class='img4' title='Unarchive'></button>
											</form>
											<form method='POST' action='trash.php'>
												<input type='text' value='".encrypt($hide['id'], 'Cyrine')."' name='ID' style='display:none'>
												<button class='btn' onclick='return confirm(\"Are you sure you want to move this email to trash bin?\")'><img src='Images/delete.png' class='img5' title='Move to trash bin'></button>
											</form>
										</div>
										<div class='p25 m5'>
											<p>".$hide['sendDate']."</p>
										</div>
									</div>";
							}
						}

						echo "</div>";

					echo "<div id='main-div'>
							<div class='divB'>
								<div class='rdiv'>
									<img src='Images/logo 2.png' class='img1'>
								</div>
							</div>
							<form id='box' method='POST' action='send.php'>
								<p>to: 
									<input type='text' name='reciever'>
								</p>
								<p>
									<div id='sub-Div'>
										<input type='text' name='subject' placeholder='Add a subject' id='sub-inp'>
									</div>
								</p>
								<div class='line'></div>
								<p><textarea name='textmessage' rows='10' cols='80' style='width :100%'></textarea>
								<div class='line'></div>
								<input type='submit' value='Send'>
							</form>
						</div>";
		}
	}
	?>
			 
			
</body>
<script>
	function compose()
	{
		document.getElementById('maindiv').style.display="none";
		document.getElementById('main-div').style.display="block";
		document.getElementById('sentdiv').style.display="none";
		document.getElementById('trashdiv').style.display="none";
		document.getElementById('archivediv').style.display="none";
	}

	function inbox()
	{
		document.getElementById('maindiv').style.display="block";
		document.getElementById('main-div').style.display="none";
		document.getElementById('sentdiv').style.display="none";
		document.getElementById('trashdiv').style.display="none";
		document.getElementById('archivediv').style.display="none";
	}

	function sent()
	{
		document.getElementById('maindiv').style.display="none";
		document.getElementById('main-div').style.display="none";
		document.getElementById('sentdiv').style.display="block";
		document.getElementById('trashdiv').style.display="none";
		document.getElementById('archivediv').style.display="none";
	}

	function trash()
	{
		document.getElementById('maindiv').style.display="none";
		document.getElementById('main-div').style.display="none";
		document.getElementById('sentdiv').style.display="none";
		document.getElementById('trashdiv').style.display="block";
		document.getElementById('archivediv').style.display="none";
	}
	
	function archive()
	{
		document.getElementById('maindiv').style.display="none";
		document.getElementById('main-div').style.display="none";
		document.getElementById('sentdiv').style.display="none";
		document.getElementById('trashdiv').style.display="none";
		document.getElementById('archivediv').style.display="block";
	}

	// function alertTrash()
	// {
	// 	alert("Are you sure you want to move this email to trash bin? ");
	// }
	var eDisplay=false;
	function emailDisplay(id)
	{
		if(eDisplay==false)
		{
			document.getElementById(id).style.display="block";
			eDisplay=true;
		}
		else
		{
			document.getElementById(id).style.display="none";
			eDisplay=false;
		}
	 }

</script>
</html>