<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "FitPal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



// Escape user inputs for security
$friend = '543';


 
// Attempt insert query execution
$sql = "UPDATE RealFriends SET Accept = '1' WHERE Sender_User_ID = '$friend';";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>