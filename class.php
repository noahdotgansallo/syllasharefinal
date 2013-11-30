<?php
session_start();
include_once('database.php');
$pageid = $_GET['id'];
$userid = $_SESSION['id'];
$getuserinfo = "SELECT * FROM users WHERE id=$userid";
$getuserrun = mysqli_query($connect, $getuserinfo);
if (isset($_POST['postcontent'])){
	if (!empty($_POST['postcontent'])){
		$postcontent = $_POST['postcontent'];
		$query = "INSERT INTO posts VALUES('', $userid, $pageid, '$postcontent', NOW())";
		$run = mysqli_query($connect, $query);
		
	}
}
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
<?

echo '<a href="forum.php?id='.$pageid.'">Homework Help</a><br />';

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
echo '<br />';
echo '<form action="class.php?id='.$pageid.'" method="POST">
<textarea name="postcontent" class="form-control"></textarea><br />
<input type="submit" value="Post" class="btn btn-primary" />';

// now we are going to get all the posts from the database
$getposts = "SELECT * FROM posts WHERE pageid=$pageid ORDER BY timeposted DESC";
$runposts = mysqli_query($connect, $getposts);
while ($row = mysqli_fetch_assoc($runposts)){
	$postid = $row['id'];
	$content = $row['content'];
	$timeposted = $row['timeposted'];
	$poster = $row['poster'];
	// get the information on the user who posted it
	$getuserinfo = "SELECT * FROM users WHERE id=$poster";
	$runuserinfo = mysqli_query($connect, $getuserinfo);
	while ($row2 = mysqli_fetch_assoc($runuserinfo)){
		$postuid = $row2['id'];
		$postfirstname = $row2['firstname'];
		$postlastname = $row2['lastname'];
		$postname = $postfirstname.' '.$postlastname;
	}
	echo '<br /><a href="profile.php?id='.$postuid.'">'.$postname.'</a><br />'.$content.'<br /><small>Posted at '.$timeposted.'</small>';
	
}
?>
</p>
</div>


<?php

include_once('rightbar.php');
include_once('footer.php');

?>