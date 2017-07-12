<?php


function myquery($sql) {
  $dbconnect = connect();
  
  $result = mysqli_query($dbconnect, $sql);
  return $result;
  close($dbconnect);
}

/* clean input before entering into database*/
function sanitize($value) {
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

function connect() {
  static $connection;
  
  if(!isset($connection)){  //no connection exists yet, so make one
    $config = parse_ini_file('../../config.ini');
    $connection = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);
  }
  if($connection === false){
    echo "Error: Failed to connect to database: </br>";
    echo "Errno: " . $connection->connect_errno . "</br>";
    echo "Error: " . $connection->connect_error . "</br>";
    return mysqli_connect_error();
  }
  return $connection;
}
    
   
function close($connection) {
  mysqli_close($connection);
}


/*$config = parse_ini_file('../../config.ini');

$connection = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);

if ($connection === false) {
    echo "Error: Failed to connect to database: </br>";
    echo "Errno: " . $connection->connect_errno . "</br>";
    echo "Error: " . $connection->connect_error . "</br>";
    exit;
}*/
?>