<?php
session_start();

if (!isset($_SESSION['id'])){
	header('location: index.php');
}
include_once('database.php');
$userid = $_SESSION['id'];

if (isset($_POST['class1'])){
	$class1 = $_POST['class1'];
	$class2 = $_POST['class2'];
	$class3 = $_POST['class3'];
	$class4 = $_POST['class4'];
	$class5 = $_POST['class5'];
	$class6 = $_POST['class6'];
	if (!empty($class1) && !empty($class2) && !empty($class3) && !empty($class4) && !empty($class5)){
		$class1 = $_POST['class1'];
		$class2 = $_POST['class2'];
		$class3 = $_POST['class3'];
		$class4 = $_POST['class4'];
		$class5 = $_POST['class5'];
		$class6 = $_POST['class6'];
		$class1get = "SELECT id FROM classes WHERE name='$class1'";
		$class1run = mysqli_query($connect, $class1get);
		while ($row = mysqli_fetch_assoc($class1run)){
			$class1 = $row['id'];
			
		}
		$class2get = "SELECT id FROM classes WHERE name='$class2'";
		$class2run = mysqli_query($connect, $class2get);
		while ($row = mysqli_fetch_assoc($class2run)){
			$class2 = $row['id'];
			
		} 
		$class3get = "SELECT id FROM classes WHERE name='$class3'";
		$class3run = mysqli_query($connect, $class3get);
		while ($row = mysqli_fetch_assoc($class3run)){
			$class3 = $row['id'];
		}
		$class4get = "SELECT id FROM classes WHERE name='$class4'";
		$class4run = mysqli_query($connect, $class4get);
		while ($row = mysqli_fetch_assoc($class4run)){
			$class4 = $row['id'];
		}
		$class5get = "SELECT id FROM classes WHERE name='$class5'";
		$class5run = mysqli_query($connect, $class5get);
		while ($row = mysqli_fetch_assoc($class5run)) {
			$class5 = $row['id'];
		} 
		if (!empty($class6)){
			$class6get = "SELECT id FROM classes WHERE name='$class6'";
			$class6run = mysqli_query($connect, $class6get);
			while ($row = mysqli_fetch_assoc($class6run)) {
				$class6 = $row['id'];
			}
		}
		
		if (!empty($class1) && !empty($class2) && !empty($class3) && !empty($class4) && !empty($class5)){
			$insert = "INSERT INTO class VALUES('', $class1, $userid)";
			$irun = mysqli_query($connect, $insert);
			$twosert = "INSERT INTO class VALUES('', $class2, $userid)";
			$tworun = mysqli_query($connect, $twosert);
			$threesert = "INSERT INTO class VALUES('', $class3, $userid)";
			$threerun = mysqli_query($connect, $threesert);
			$foursert = "INSERT INTO class VALUES('', $class4, $userid)";
			$fourrun = mysqli_query($connect, $foursert);
			$fivesert = "INSERT INTO class VALUES('', $class5, $userid)";
			$fiverun = mysqli_query($connect, $fivesert);
			if (!empty($class6)){
				$sixsert = "INSERT INTO class VALUES('', $class6, $userid)";
				$sixrun = mysqli_query($connect, $sixsert);
				
			}
		}	
		
	}
	header('location: setup.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<title>SyllaShare</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" />
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
<h2>Add Your Classes</h2>

<form action="addclasses.php" method="POST">
<input type="text" name="class1" placeholder="Class 1" /><br />
<input type="text" name="class2" placeholder="Class 2" /><br />
<input type="text" name="class3" placeholder="Class 3" /><br />
<input type="text" name="class4" placeholder="Class 4" /><br />
<input type="text" name="class5" placeholder="Class 5" /><br />
<input type="text" name="class6" placeholder="Class 6" /><br />
<input type="submit" value="Add Classes" class="btn btn-primary" />
</center>
</form>
</div>

</div>
<?php
include_once('footer.php');

?>