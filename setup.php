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


if (isset($_POST['clubs'])){
	$clubs = $_POST['clubs'];
	$interests = $_POST['interests'];
	$clubs = explode(',', $clubs);
	$interests = explode(',', $interests);
	foreach ($interests as $interests){
		$exists = "SELECT id FROM interests WHERE name='$interests'";
		$existsr = mysqli_query($connect, $exists);
		if (mysqli_num_rows($existsr) > 0){
			while ($row = mysqli_fetch_assoc($existsr)){
				$interestid = $row['id'];
			}	
			$insert = "INSERT INTO userinterest VALUES('', $id, $interestid)";
			$insertr = mysqli_query($connect, $insert);			
		} else {
			$create = "INSERT INTO interests VALUES('', '$interests')";
			$creater = mysqli_query($connect, $create);
			// now we want to get the thing we just inserted
			$get = "SELECT id FROM interests WHERE name='$interests'";
			$rget = mysqli_query($connect, $get);
			while ($row = mysqli_fetch_assoc($rget)){
				$interestid = $row['id'];
			}
			$insert = "INSERT INTO userinterest VALUES('', $id, $interestid)";
			$insertr = mysqli_query($connect, $insert);
		}
	}
	foreach($clubs as $clubs){
		$clubse = "SELECT id FROM clubs WHERE name='$clubs'";
		$clubsr = mysqli_query($connect, $clubse);
		if (mysqli_num_rows($clubsr) > 0){
			while ($row = mysqli_fetch_assoc($clubsr)){
				$clubid = $row['id'];
			}	
			$insertc = "INSERT INTO userclubs VALUES('', $id, $clubid)";
			$insertcr = mysqli_query($connect, $insertc);
			
		} else {
			$createc = "INSERT INTO clubs VALUES('', '$clubs')";
			$createcr = mysqli_query($connect, $createc);
			//get the thing we just inserted as we did before
			$getc = "SELECT id FROM clubs WHERE name='$clubs'";
			$rgetc = mysqli_query($connect, $getc);
			while ($row = mysqli_fetch_assoc($rgetc)){
				$clubid = $row['id'];
			}
			$insertc = "INSERT INTO userclubs VALUES('', $id, $clubid)";
			$insertcr = mysqli_query($connect, $insertc);
		}
	}
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

<br />
<!--<form action="setup.php" method="POST">
Upload A Profile Picture <input type="file" name="profPic" id="profPic" /> <br />
<input type="submit" value="Upload" class="btn btn-primary" />
</form>-->

<form action="setup.php" method="POST">
<input type="text" name="clubs" class="form-control" placeholder="Your clubs separated by a comma" /><br />
<input type="text" name="interests" class="form-control" placeholder="Your interests separated by a comma" /><br />
<input type="submit" value="Take Me To My Syllashare" class="btn btn-primary" /><br />
</form>
</div>
</div>
<?php
include_once('footer.php');
?>

