<?php
session_start();
require('database.php');

$chatid = $_GET['c'];
$message = $_GET['m'];
$userid = $_SESSION['id'];

echo "You said:<br>", $message;

$query = "INSERT INTO messages VALUES('', $chatid, '$message', $userid, '', NOW())";
$run = mysqli_query($connect, $query);



?>
