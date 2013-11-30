<?php
if (isset($_POST['email'])){
	$to = $_POST['email'];
	$subject = "Welcome To SyllaShare";
	$message = "<html>
	<head>
	<title>SyllaShare Activation</title>
	</head>
<body>
<h1>Welcome To SyllaShare!</h1>
<p>We are pleased to have you join us.  Your 8 digit activation code is below.</p><br />
<b>87432341</b>
"; 
$message  ="hey";

$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1"."\r\n";

$headers .= "From: <activation@syllashare.com>"."\r\n";
mail($to,$subject,$message,$headers);
}





?>
<!DOCTYPE html>
<html>
<head>
<title>Mail Test</title>

</head>
<body>
<form action="testmail.php" method="POST">

<input type="email" name="email" placeholder="Enter Your Email" /><br />
<input type="submit" value="Send Email" />
</form>
</body>
</html>
