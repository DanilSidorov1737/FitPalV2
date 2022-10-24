<?php

session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "FitPal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$oldpass = mysqli_real_escape_string($link, $_REQUEST['password']);
$newpass = mysqli_real_escape_string($link, $_REQUEST['newpassword']);
$owner = $_SESSION['user'];

$result = $_SESSION['pass'];


// Attempt insert query execution
$sql = "UPDATE Users_1 SET Pass = IF('$oldpass'='$result', $newpass, '$result') WHERE Username = '$owner'";



if(mysqli_query($link, $sql)){
    if(mysqli_affected_rows($link) >0 ){
        session_start();
        echo "Logout Successfully ";
        session_destroy();   // function that Destroys Session 
        header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/pages-login.php");
    }
    else{
        echo 'Sorry That Password Change Was Not Successful';
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);









?>