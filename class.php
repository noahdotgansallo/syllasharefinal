<?php
session_start();
include_once('database.php');
$pageid = $_GET['id'];
$userid = $_SESSION['id'];
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
<h1 class="lead">
<?
$thequery = "SELECT * FROM classes WHERE id=$pageid";
$therun = mysqli_query($connect, $thequery);
while ($row = mysqli_fetch_assoc($therun)){
	$pageclassname = $row['name'];
}
?>

<center>
<?php echo $pageclassname; ?>
</center>
</h1>
<br />
<br />
<?
//get the members on the page
echo '<p class="lead">People in this class: <br />';
$getmembers = "SELECT userid FROM class WHERE classid=$pageid";
$runmembers = mysqli_query($connect, $getmembers);
while ($row = mysqli_fetch_assoc($runmembers)){
	$memberid = $row['userid'];
	$getmemberinfo = "SELECT id,firstname,lastname FROM users WHERE id=$memberid";
	$runmemberinfo = mysqli_query($connect, $getmemberinfo);
	while ($row2 = mysqli_fetch_assoc($runmemberinfo)){
		$memberfname = $row2['firstname'];
		$memberlname = $row2['lastname'];
	}	
	echo '<a href="profile.php?id='.$memberid.'">'.$memberfname.' '.$memberlname.'</a><br />';
	
	
}
?>
</p>
</div>


<?php

include_once('rightbar.php');
include_once('footer.php');

?>