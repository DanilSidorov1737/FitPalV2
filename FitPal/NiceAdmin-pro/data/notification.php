<?php
session_start();

//setting header to json
 header('Content-Type: application/json');
 

//database
 define('DB_HOST', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', 'root');
 define('DB_NAME', 'FitPal');

//get connection
 $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

 if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}






//execute query
  $owner = $_SESSION['user'];
  
  $result = $mysqli->query("SELECT Username FROM Users_1 WHERE User_ID IN (SELECT Sender_User_ID FROM RealFriends WHERE Receive_User_ID = (SELECT User_ID FROM Users_1 WHERE Username = '$owner' AND Accept = '0'))");


 


//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}


  

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);




  
   

?>





