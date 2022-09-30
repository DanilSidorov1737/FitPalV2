<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "FitPal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



// Escape user inputs for security
$weight = mysqli_real_escape_string($link, $_REQUEST['weightid']);
$date = mysqli_real_escape_string($link, $_REQUEST['dateid']);

 
// Attempt insert query execution
$sql = "INSERT INTO weight (weight, date) VALUES ('$weight', '$date')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>