<?php
session_start();
include_once('database.php');

if (!isset($_SESSION['id'])){
	header('location: index.php');
}
$user1 = $_SESSION['id'];
$user2 = $_GET['id'];



// now we want to check if the chat exists

$getchat = "SELECT * FROM chats WHERE user1=$user1 AND user2=$user2 OR user1=$user2 AND user2=$user1";
$getchatr = mysqli_query($connect, $getchat);
if (mysqli_num_rows($getchatr) > 0){
	// this chat exists
	while ($row = mysqli_fetch_assoc($getchatr)){
		$chatid = $row['id'];
		
	}
	
	
} else {
	//this chat doesnt exist, we need to create it
	$makechat = "INSERT INTO chats VALUES('', $user1, $user2)";
	$makechatr = mysqli_query($connect, $makechat);
	// now we have to get the id of the chat we just made
	$newgetchat = "SELECT id FROM chats WHERE user1=$user1 AND user2=$user2";
	$newgetchatr = mysqli_query($connect, $newgetchat);
	while ($row = mysqli_fetch_assoc($newgetchatr)){
		$chatid = $row['id'];
	}
}
if (isset($_POST['chatcontent'])){
	$chatcontent = $_POST['chatcontent'];
	if (!empty($chatcontent)){
		$sendchat = "INSERT INTO messages VALUES('', $chatid, '$chatcontent', $user1, '', NOW())";
		$sendchatr = mysqli_query($connect, $sendchat);
	}
}

include_once('header.php');

?>

<div id="span6">
<?php

// now we want to get the messages from this chat

$getmessages = "SELECT * FROM messages WHERE chatid=$chatid";
$getmessagesr = mysqli_query($connect, $getmessages);
while ($row = mysqli_fetch_assoc($getmessagesr)){
	$mid = $row['id'];
	$content = $row['content'];
	$sentid = $row['sentid'];
	$timesent = $row['timesent'];
	if ($sentid == $user1){
		echo 'You said: <br />'.$content.'<br />';
	} else {
		//get the information on the other user
		$getuserinfo = "SELECT firstname, lastname FROM users WHERE id=$sentid";
		$getuserinfor = mysqli_query($connect, $getuserinfo);
		while ($row2 = mysqli_fetch_assoc($getuserinfor)){
			$sentfirstname = $row2['firstname'];
			$sentlastname = $row2['lastname'];
		}
		$sentname = $sentfirstname.' '.$sentlastname;
		echo $sentname.' said: <br />'.$content.'<br />';
		
	}
}

echo '<form action="chat.php?id='.$user2.'" method="POST">
<textarea name="chatcontent" placeholder="Chat.." class="form-control" />
<input type="submit" value="Send" class="btn btn-primary" />
</form>';

?>
</div>

<?php
include_once('rightbar.php');
include_once('footer.php');

?>