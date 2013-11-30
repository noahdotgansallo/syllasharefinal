<?php
$connect = mysqli_connect('localhost', 'root', 'Nsr10ojif??', 'syllasharenew') or die('could not connect');

if (isset($_POST['name'])){
	$name = $_POST['name'];
	
	//$query = "INSERT INTO classes VALUES('', '$name')";
	//$run = mysqli_query($connect, $query);
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>

</title>
</head>
<body>


<form action="createscript.php" method="POST"> 
<input type="text" name="name" placeholder="class" /><br />
<input type="submit" value="submit" /><br />
</form>

</body>
</html>