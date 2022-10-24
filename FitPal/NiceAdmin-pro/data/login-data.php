<?php session_start(); ?>
<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
 if(empty($_POST['username']) || empty($_POST['password'])){
 $error = "Username or Password is Invalid";
 }
 else
 {
 //Define $user and $pass
 $user=$_POST['username'];
 $pass=$_POST['password'];
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "root");
 //Selecting Database
 $db = mysqli_select_db($conn, "FitPal");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM Users_1 WHERE Pass ='$pass' AND Username='$user'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
session_start();
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;

 header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/"); // Redirecting to other page
 }
 else
 {
 header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/pages-error-404.html");
 }
 mysqli_close($conn); // Closing connection
 }
}
 
?>

