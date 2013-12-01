<?php
include_once('database.php');
$postid = $_GET['id'];
$redirect = $_POST['pageid'];
var_dump($redirect);
session_start();
$userid = $_SESSION['id'];
//check to see if the user already upped it
$already = "SELECT * FROM up WHERE userid=$userid AND postid=$postid";
$alreadyr = mysqli_query($connect, $already);
if (mysqli_num_rows($alreadyr) == 0){
// check to see if the user already downed it
$check = "SELECT * FROM down WHERE userid=$userid AND postid=$postid";
$checkr = mysqli_query($connect, $check);
if (mysqli_num_rows($checkr) > 0){
	$deletelike = "DELETE FROM down WHERE userid=$userid AND postid=$postid";
	$deleterun = mysqli_query($connect, $deletelike);
}
$query = "INSERT INTO up VALUES('', $userid, $postid)";
$run = mysqli_query($connect, $query);
} else {

}
header("location: question.php?id=$redirect");
?>