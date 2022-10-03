

<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "FitPal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sender = $_SESSION['user'];
$reciever = $_POST['friendname'];

 
// Attempt insert query execution
$sql = "INSERT INTO RealFriends (Receive_User_ID, Sender_User_ID, Accept) VALUES ((SELECT User_ID from Users_1 WHERE Username = '$reciever'), ((SELECT User_ID from Users_1 WHERE Username = '$sender')), '0')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


