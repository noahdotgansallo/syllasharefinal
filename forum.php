<?php
session_start();
if (!isset($_SESSION['id'])){
	header('location: index.php');
}
include_once('database.php');
$userid = $_SESSION['id'];
$pageid = $_GET['id'];
if (isset($_POST['askquestion'])){
	header("location: askquestion.php?id=$pageid");
}

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
<center>
<?php
//get the class info
$thequery = "SELECT * FROM classes WHERE id=$pageid";
$therun = mysqli_query($connect, $thequery);
while ($row = mysqli_fetch_assoc($therun)){
	$pageclassname = $row['name'];
}
echo $pageclassname;

?>
</center>
</h1>
<p class="lead">
<?php
echo 'Questions made for this forum: <br />';

echo '<form action="forum.php?id='.$pageid.'" method="POST">
<input type="hidden" name="askquestion" /><input type="submit" value="Ask Question" class="btn btn-warning" />
</form>';

//get all the forum posts for this class
$getforums = "SELECT id,poster,question,timeposted FROM forumposts WHERE classid=$pageid";
$runforums = mysqli_query($connect, $getforums);
while ($row = mysqli_fetch_assoc($runforums)){
	$postid = $row['id'];
	$poster = $row['poster'];
	$question = $row['question'];
	$timeposted = $row['timeposted'];
	//get the information on the poster
	$getuserinfo = "SELECT firstname,lastname FROM users WHERE id=$poster";
	$getuserinfor = mysqli_query($connect, $getuserinfo);
	while ($row2 = mysqli_fetch_assoc($getuserinfor)){
		$firstname = $row2['firstname'];
		$lastname = $row2['lastname'];
		$questionname = $firstname.' '.$lastname;
	}
	echo '<b><a href="question.php?id='.$postid.'">'.$question.'</a></b> Posted by '.$questionname.' at '.$timeposted;
	
}	

?> 

</p>
</div>

<?php

include_once('rightbar.php');
include_once('footer.php');
?>
