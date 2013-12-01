<div class="span3" style="height: 100%; border-left: 1px solid #d9d9d9;">
<br />
<center>
<b>Assignments</b>
</center><br />
<style type="text/css">
small {
	padding-left: 15px;
}
p {
	padding-left: 20px;
}
</style>
<small>Algebra 2/Trig</small><br />
<p>
Page 14-25 in the Textbook.  Due 11/30/13.
</p>
<small>Spanish II</small><br />
<p>
Estudia el packete para la tarea.
</p>
<small>Comparative Cultures</small>
<p>
Read the entire bulkpack by tomorrow.
</p>
<small>Physics</small>
<p>
Do tonights WebAssign.
</p>
<small>English</small>
<p>
Do your heritage project.
</p>
<p>
Do experience day. 
</p>
<hr />
<center>
<b>Online: </b>
</center>
<!--<p>James Pickering</p>
<p>Max Mines</p>
<p>Noah Gansallo</p>
<p>Sam Slavitt</p>
<p>Benny Hams</p>-->
<?php
//for right now, we are just going to pull from all the users 
$getchat = "SELECT id,firstname,lastname FROM users WHERE id!=$userid";
$getchatr = mysqli_query($connect, $getchat);
while ($row = mysqli_fetch_assoc($getchatr)){
	$friendid = $row['id'];
	$friendfname = $row['fname'];
	$friendlname = $row['lname'];
	echo '<p><a href="chat.php?id='.$friendid.'">'.$friendfname.' '.$friendlname.'</a></p>';
	
}

?>
</div>
</div>