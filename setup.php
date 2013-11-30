<?php
session_start();
if (!isset($_SESSION['id'])){
	header('location: index.php');
}
include_once('database.php');


$id = $_SESSION['id'];

if (isset($_POST['profPic'])){
	if ($_FILES['profPic']['tmp_name'] != "") {
		$maxfilesize = 1051200; 
		if ($_FILES['profPic']['size'] > $maxfilesize){
			$errormsg = 'Image too large';
		} else {
			$newname = "image01.jpg";
			$place_file = move_uploaded_file($_FILES['profPic']['tmp_name'], "members/".$newname);
		}
	}
}// header('location: home.php');


if (isset($_POST['continue'])){
	header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<title>SyllaShare</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/jquery.tagit.css" rel="stylesheet" type="text/css" />
<link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.navbar-inner {
	background-color: #4d8cbc;
	background-image: none;
	color: #FFFFFF;
}

.navbar .nav > li > a {
	color: #FFFFFF;
}
.navbar .nav > li >a:hover {
	color: #FFFFFF;
}

.navbar .nav > .active > a,
.navbar .nav > .active > a:hover,
.navbar .nav > .active > a:focus {
	color: #FFFFFF;
	background-color: #FFFFFF;
}
</style>
</head>
<body>
<div class="navbar navbar-fixed-top" >
	<div class="navbar-inner">
		<div class="container" >
			<ul class="nav">
				<li>
					<a class="brand" href="#">SyllaShare</a>
				</li>

				<li><a href="#">Home</a></li>
				<li><a href="#">Profile</a></li>
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" name="q" placeholder="Search" />
				</form>
			</ul>
		</div>
	</div>
</div>

<div class="container">
<div class="hero-unit">
<center>
<h2>Account Setup</h2>
</center>

<br /><Br />
<form action="setup.php" method="POST">
<input type="hidden" name="continue" value="sfd" /><br />
<input type="submit" value="Take Me to Syllashare" class="btn btn-primary" />
</form>
<!--<form action="setup.php" method="POST">
Upload A Profile Picture <input type="file" name="profPic" id="profPic" /> <br />
<input type="submit" value="Upload" class="btn btn-primary" />
</form>-->

<form action="setup.php">
<ul id="allowSpacesTags"></ul>
</form>
</div>
</div>
<?php
include_once('footer.php');
?>

