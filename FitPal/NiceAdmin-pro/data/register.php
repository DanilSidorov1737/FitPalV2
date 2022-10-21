<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "FitPal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$gender = mysqli_real_escape_string($link, $_REQUEST['genderreg']);
$birth = mysqli_real_escape_string($link, $_REQUEST['birth']);
$pass = mysqli_real_escape_string($link, $_REQUEST['password']);
$addy = mysqli_real_escape_string($link, $_REQUEST['addy']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO Users_1 (Username, Gender, StreetAddress, EmailAddress, Birthday, Pass) VALUES ('$username', '$gender', '$addy', '$email', '$birth', '$pass')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


