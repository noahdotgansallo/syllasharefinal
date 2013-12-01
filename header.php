
<!DOCTYPE html>
<html lang="en">
<head>
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
				<?php
				if (!isset($_SESSION['id'])){
					?>
					<form action="login.php" method="POST" class="navbar-form pull-left">
						<input type="email" name="logemail" placeholder="Email" />
						<input type="password" name="logpassword" placeholder="Password" />
						<input type="submit" value="Log In" />
					</form>
					<?
				} else {
				?>
				<li><a href="home.php">Home</a></li>
				<li><a href="#">Profile</a></li>
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" name="q" placeholder="Search" />
				</form>
				<li><a href="logout.php">Logout</a></li>
				<? }?>
			</ul>
		</div>
	</div>
</div>

<?
if (isset($_SESSION['id'])){
	?>
<br /><br />
<div class="row-fluid" style="height: 100%;">
<div class="span3" style="padding-left: 20px; padding-right: 2px; border-right: 1px solid #d9d9d9;">
<div class="innercontent" >
<br />
<p class="lead">

<div id="pic-right" style="float: right;padding-right: 35px; padding-top: 50px; position: relative; "> 
<?php
echo $firstname.' '.$lastname;
?>
</div>
<div class="pic-left" style="position: relative;" >
<img src="propic.jpg" height="75" width="75" />
</div>
<br />
<center>
<b>Classes</b><br />
</center>
<style type="text/css">
.spanright {
	text-align: left;
	padding-right: 4px;


}
.spanright:hover {
	background-color: #f2f2f2;
}
</style>

<?php
//get classes and print out their names

$getclasses = "SELECT * FROM class WHERE userid=$userid";
$runclasses = mysqli_query($connect, $getclasses);
while ($row = mysqli_fetch_assoc($runclasses)){
	$classid = $row['classid'];
	$getclassinfo = "SELECT name FROM classes WHERE id=$classid";
	$runclassinfo = mysqli_query($connect, $getclassinfo);
	while ($row2 = mysqli_fetch_assoc($runclassinfo)){
		$classname = $row2['name'];
	}
	echo '<span class="spanright"><a href="class.php?id='.$classid.'">'.$classname.'</a></span><br />';
}



?>
<b>Clubs</b><br />
</center>
<span class="spanright">Model UN</span><br />
<span class="spanright">Mock Trial</span><br />
<span class="spanright">XKCD</span><br />
<br />
<center>
<b>Interests</b><br />
<span class="spanright">Programming</span><br />
<span class="spanright">Basketball</span><br />
<span class="spanright">Guitar</span><br />
<span class="spanright">Drums</span><br />
</center>
</p>
</div>
</div>
<?php 

}

?>

