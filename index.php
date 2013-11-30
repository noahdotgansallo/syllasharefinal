<?php
session_start();
if (isset($_SESSION['id'])){
	header('location: home.php');
}
include_once('database.php');
if (isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$grade = $_POST['grade'];
	if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($grade)){
		if ($password == $cpassword){
			$code = mt_rand(10000000, 99999999);
			$password = md5($password);
			$query = "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password', '', $code, $grade)";
			//echo '<script type="text/javascript">alert("'.var_dump($query).'"); </script>';
			$run = mysqli_query($connect, $query);
			$justsign = "SELECT id FROM users WHERE email='$email' AND password='$password'";
			$justrun = mysqli_query($connect, $justsign);
			while ($row = mysqli_fetch_assoc($justrun)){
				$userid = $row['id'];
			}
			$_SESSION['email'] = $email;
			header("location: http://connectjh.webege.com/activateuser.php?email=$email&code=$code");
		} else {
			//their passwords do not match
		}
	} else {
		//they didnt fill out all the forms
	}
}
include_once('header.php');

?>

<div class="container">
<div class="hero-unit">
<center>
<h2>
Register
</h2>
<form action="index.php" method="POST">
	<input type="text" placeholder="First Name" name="firstname" /><br />
					<input type="text" placeholder="Last Name" name="lastname" /><br />
					<input type="email" placeholder="Email" name="email" /><br />
					<input type="password" placeholder="Password" name="password" /><br />
					<input type="password" placeholder="Confirm Password" name="cpassword" /><br />
					Grade: 9<input type="radio" name="grade" value="9" /> 10<input type="radio" name="grade" value="10" />
					11<input type="radio" name="grade" value="11" /> 12<input type="radio" name="grade" value="12" /><br />
					<input type="submit" value="Register" class="btn btn-primary" />
</form>
<?php
echo '<br />';
?>
</div>
</div>
</center>