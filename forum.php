<?php
session_start();
if (!isset($_SESSION['id'])){
	header('location: index.php');
}
$userid = $_SESSION['id'];
$pageid = $_GET['id'];
$getuserinfo = "SELECT * FROM users WHERE id=$userid";
$getuserrun = mysqli_query($connect, $getuserinfo);
while ($row = mysqli_fetch_assoc($getuserrun)){
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$email = $row['email'];
}

include_once('header.php');

?>
<div class="span6">
<p class="lead">

</p>
</div>

<?php

include_once('rightbar.php');
include_once('footer.php');
?>
