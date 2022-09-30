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
 

  $result = $mysqli->query("SELECT User_ID, Username, Birthday, Gender FROM Users_1");


 

  





 
  



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





