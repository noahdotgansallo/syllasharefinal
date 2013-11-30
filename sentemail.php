<?php
session_start();
$email = $_SESSION['email'];
include_once('database.php');


if (isset($_POST['activationcode'])){
	$activationcode = $_POST['activationcode'];
	if (!empty($activationcode)){
		$query = "SELECT * FROM users WHERE email='$email' AND code=$activationcode";
		$run = mysqli_query($connect, $query);
		if (mysqli_num_rows($run) > 0){
			$activate = "UPDATE users SET activated=1 WHERE email='$email' and code=$activationcode";
			$runactivate = mysqli_query($connect, $activate);
			while ($row = mysqli_fetch_assoc($run)){
			$userid = $row['id'];
			$_SESSION['id'] = $userid;
			header('location: addclasses.php');
			}
		} else {
			$errormsg = "Wrong activatoin code.";
		}

	} else {
		$errormsg = "Type in something!";
	}
}
include_once('header.php');



?>
<div class="container">
<div class="hero-unit">

<center>
<h2>Activation</h2>
</center>
<p class="lead">We sent you an email with your activation code to <? echo $email; ?></p>
<? echo '<strong color="red">'.$errormsg.'</strong>'; ?>
<br />
<form action="sentemail.php" method="POST">

<input type="text" placeholder="Activation Code" name="activationcode" /><br />
<input type="submit" value="Activate" class="btn btn-primay" />
</form>
</div>
</div>