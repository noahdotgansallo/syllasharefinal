<?php
session_start();
include_once('database.php');

$email = $_POST['logemail'];
$password = $_POST['logpassword'];
$password = md5($password);

$query = "SELECT id FROM users WHERE email='$email' AND password='$password' AND activated=1";
$run = mysqli_query($connect, $query);
if (mysqli_num_rows($run) > 0){
	while ($row = mysqli_fetch_assoc($run)){
		$id = $row['id'];

	}
	$_SESSION['id'] = $id;
	header('location: home.php');
} else {
	header('location: index.php');
}

?>