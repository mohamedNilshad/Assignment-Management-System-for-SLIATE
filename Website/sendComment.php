<!--<?php
/*
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email= $_POST['email'];
	$message = $_POST['message'];


	$receiver = "ati.student.lms@gmail.com";
	$subject = "User Message FROM: $name";
	$body = "$message";
	$sender = "From:$email";
	
	if(mail($receiver,$subject ,$body ,$sender)){
		echo"Email Sent Successfully";
	}
	else{
		echo"Sorry, failed While sending mail";
	}
	
}

*/

?>-->




<!DOCTYPE html>
<html>
<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="keywords" content="footer, address, phone, icons" />
 
</head>
<body>



<form action="mailto:ati.student.lms@gmail.com" method="post" enctype="text/plain">
Name:<br>
<input type="text" name="name"><br>
E-mail:<br>
<input type="email" name="mail"><br>
Comment:<br>
<textarea cols="55" rows="5" name="message"></textarea><br><br>
<input type="submit" name="submit" value="Send">
<input type="reset" value="Reset">
</form>

</body>
</html>