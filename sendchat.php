<?php
session_start();
require('database.php');

$chatid = $_GET['c'];
$message = $_GET['m'];
$userid = $_SESSION['id'];

$query = "INSERT INTO messages VALUES('', $chatid, '$message', $userid, '', NOW())";
$run = mysqli_query($connect, $query);

// echo "Run:<br>", $run, "<br>Query:<br>", $query, "<br>Chat ID:<br>", $chatid, "<br>User ID:<br>", $userid, "<br>You said:<br>", $message;

?>