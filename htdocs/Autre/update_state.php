<?php
header("Cache-Control: max-age=1"); // don't cache ourself
$state = $_POST['state'];

// Update the state of the video player in the database
$conn = mysqli_connect('localhost', 'root', '', 'test');
$sql = "UPDATE player_state SET state='$state' WHERE id=1";
mysqli_query($conn, $sql);

// Retrieve the current state of the video player from the database
$sql = "SELECT state FROM player_state WHERE id=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['state'];
?>