<?php
include_once('database.php');
session_start();
$userid = $_SESSION['id'];
$pageclassid = $_GET['id'];
if (!isset($_SESSION['id'])){
	header('location: index.php');
}
if (isset($_POST['title'])){
	if (!empty($_POST['title']) && !empty($_POST['description'])){
		$title = mysqli_real_escape_string($connect, $_POST['title']);
		
		$description = mysqli_real_escape_string($connect, $_POST['description']);
		$addquestion = "INSERT INTO forumposts VALUES('', $userid, $pageclassid, '$title', '$description', NOW())";
		$addquestionr = mysqli_query($connect, $addquestion);
		//now we want to get the id of the question we just asked.
		$getid = "SELECT * FROM forumposts WHERE poster=$userid AND classid=$pageclassid ORDER BY id DESC LIMIT 1";
		$getidr = mysqli_query($connect, $getid);
		while ($row = mysqli_fetch_assoc($getidr)){
			$questionid = $row['id'];
			
		}
		header("location: question.php?id=$questionid");
		
	} else {
		// they left some fields blank
	}
}
include_once('header.php');
?>
<div class="span6">
<h1 class="lead">
Ask Your Question
</h1>
<form action="askquestion.php?id=<?php echo $pageclassid; ?>" method="POST">
<input type="text" class="form-control" name="title" placeholder="Your Question" /><br />
<textarea name="description" class="form-control" placeholder="More Information"></textarea><br />
<input type="submit" value="Ask Question" class="btn btn-warning" /><br />


</div>


</form>
<br />


<?
include_once('rightbar.php');
include_once('footer.php');

?>