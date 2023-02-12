<?php

	include 'connect.php';
	session_start();

	$to = "select id, firstName, lastName from users where Email='".$_POST['reciever']."'";
	$from = "select id, firstName, lastName from users where id='".$_SESSION['id']."'";

	if($r=$connection->query($to))
	{
		if($r->num_rows>0)
		{
			if($R=$connection->query($from))
			{
				if($R->num_rows>0)
				{
					$rows = $r->fetch_assoc();
					$Rows = $R->fetch_assoc();
					
					$msg=str_replace("'","\'", $_POST['textmessage']);
					$mesg=str_replace('"','\"', $msg);

					$send = "insert into emails(senderId, senderFName, senderLName, recieverId, recieverFName, recieverLName, subject, emailBody, sendDate) values(".$Rows['id'].",'".$Rows['firstName']."','".$Rows['lastName']."',".$rows['id'].",'".$rows['firstName']."','".$rows['lastName']."','".$_POST['subject']."','".$mesg."',CURRENT_TIMESTAMP)";
					if($connection->query($send))
					{
						header("Location:Mailpage.php?s=success");
					}
				}
			}
		}
	}
	// echo $_POST['reciever'];
	// echo $_POST['subject'];
	// echo $_POST['textmessage'];

?>