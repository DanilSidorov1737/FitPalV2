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


$owner = $_SESSION['user'];

//execute query
  $result = $mysqli->query("SELECT * FROM `PR` WHERE User_ID_FK_PR = (SELECT User_ID FROM Users_1 WHERE Username = '$owner') ");
  $result2 = $mysqli->query("SELECT COUNT(*) AS WKNUM FROM Logs WHERE User_ID_FK = (SELECT User_ID FROM Users_1 WHERE Username = '$owner')");
  $result3 = $mysqli->query("SELECT `friends_id` FROM `friends` ORDER BY `friends_id` DESC LIMIT 1");
  $result4 = $mysqli->query("SELECT `weight`, `date` FROM `weight` WHERE User_ID_FK_Weight = (SELECT User_ID FROM Users_1 WHERE Username = '$owner') ");
  $result5 = $mysqli->query("SELECT `Comments`, `Review`, `Time`, `Muscle`, `Date` FROM `Logs` WHERE User_ID_FK = (SELECT User_ID FROM Users_1 WHERE Username = '$owner')");
  $result6 = $mysqli->query("SELECT `Username`, `Gender`, `EmailAddress`, `Birthday` FROM `Users_1` WHERE `Username` = '{$_SESSION["user"]}' ");
  $result8 = $mysqli->query(" SELECT * FROM About WHERE User_ID_About_FK = (SELECT User_ID FROM Users_1 WHERE Username = '{$_SESSION["user"]}' ) ");
  $result9 = $mysqli->query("SELECT COUNT(Username) AS 'Friends' FROM Users_1 WHERE User_ID IN (SELECT Sender_User_ID FROM RealFriends WHERE Receive_User_ID = (SELECT User_ID FROM Users_1 WHERE Username = '$owner' AND Accept = '1')) ");


  


 

  





 
  



//loop through the returned data
  $data = array();
  foreach ($result as $row) {
    $data[] = $row;
  }
  foreach ($result2 as $row) {
    $data[] = $row;
  }
  foreach ($result3 as $row) {
    $data[] = $row;
  }
  foreach ($result4 as $data4[]) {
    
  }
  $data[] = $data4;
  foreach ($result5 as $data5[]) {
   }
   $data[] = $data5;

  foreach ($result6 as $row) {
    $data[] = $row;
    }
  foreach ($result7 as $row) {
    $data[] = $row;
    }
  foreach ($result8 as $row) {
    $data[] = $row;
  }
  foreach ($result9 as $row) {
    $data[] = $row;
  }
    




  

//free memory associated with result
  $result->close();

//close connection
  $mysqli->close();

//now print the data
  print json_encode($data);


?>





