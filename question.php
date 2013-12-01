<?php
include_once('database.php');
session_start();
if (!isset($_SESSION['id'])){
	header('location: index.php');
}	

$userid = $_SESSION['id'];
$questionid = $_GET['id'];

if (isset($_POST['comment'])){
	$comment = $_POST['comment'];
	if (!empty($comment)){
		$commentq = "INSERT INTO forumcomment VALUES('', $userid, $questionid, '$comment', NOW())";
		$commentr = mysqli_query($connect, $commentq); 
	} else {
		//the user didnt answer the shit
	}
}
include_once('header.php');

?>

<div class="span6">
<?php
// now we want to get information on the question
$getquestioninfo = "SELECT * FROM forumposts WHERE id=$questionid";
$getquestioninfor = mysqli_query($connect, $getquestioninfo);
while ($row = mysqli_fetch_assoc($getquestioninfor)){
	$poster = $row['poster'];
	$classid = $row['classid'];
	$question = $row['question'];
	$content = $row['content'];
	$timeposted = $row['timeposted'];
	
}
// now we want to get the information on the poster
$getposterinfo = "SELECT firstname,lastname FROM users WHERE id=$poster";
$getposterinfor = mysqli_query($connect, $getposterinfo);
while ($row = mysqli_fetch_assoc($getposterinfor)){
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$poster = $firstname.' '.$lastname;
}

echo '<center><h1 class="lead"><b>'.$question.'</b></h1><br /></center>';
echo '<p class="lead">'.$content.'</p><small>Posted by '.$poster.' at '.$timeposted.'</small><br />';
echo '<br />';
echo '<form action="question.php?id='.$questionid.'" method="POST">
<textarea name="comment" placeholder="Your Answer..." class="form-control"></textarea><br />
<input type="submit" value="Answer Question" class="btn btn-warning" /></form>';
 
 
//here we want to display the comments 
$getcomments = "SELECT * FROM forumcomment WHERE postid=$questionid";
$runcomments = mysqli_query($connect, $getcomments);
echo '<br />Answers <b>('.mysqli_num_rows($runcomments).')</b><br />';

while ($row = mysqli_fetch_assoc($runcomments)){
	$cid = $row['id'];
	$cposter = $row['userid'];
	$ccontent = $row['content'];
	$ctime = $row['timecomment'];
	//get information on the poster
	$getcuserinfo = "SELECT * FROM users WHERE id=$cposter";
	$getcuserinfor = mysqli_query($connect, $getcuserinfo);
	while ($row2 = mysqli_fetch_assoc($getcuserinfor)){
		$cfname = $row2['firstname'];
		$clname = $row2['lastname'];
		$cposter = $cfname.' '.$clname;		
	}
	echo $ccontent.' <small>'.$cposter.' at '.$ctime.'</small><br />';
	
}	
?>
</div>

<?php
include_once('rightbar.php');
include_once('footer.php');

?>