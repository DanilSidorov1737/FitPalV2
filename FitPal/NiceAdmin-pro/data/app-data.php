<?php
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
  $result = $mysqli->query("SELECT * FROM `PR` WHERE 1");
  $result2 = $mysqli->query("SELECT `workout_id` FROM `WorkoutNum` ORDER BY `workout_id` DESC LIMIT 1");
  $result3 = $mysqli->query("SELECT `friends_id` FROM `friends` ORDER BY `friends_id` DESC LIMIT 1");
  $result4 = $mysqli->query("SELECT `weight`, `date` FROM `weight` WHERE 1");
  $result5 = $mysqli->query("SELECT `Comments`, `Review`, `Time`, `Muscle`, `Date` FROM `Logs` WHERE 1");
  $result6 = $mysqli->query("SELECT `Username`, `Gender`, `EmailAddress`, `Birthday` FROM `Users_1` WHERE `User_ID` = 2");
  $result7 = $mysqli->query("SELECT * FROM `About` WHERE 1");


  


 

  





 
  



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
    




  

//free memory associated with result
  $result->close();

//close connection
  $mysqli->close();

//now print the data
  print json_encode($data);


?>




