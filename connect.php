<?php
$user = 'root';
$password = 'root';
$db = 'LittleBearBread';
$host = 'localhost';
$port = 8889;

$conn = mysql_connect(
   "$host:$port", 
   $user, 
   $password,
   $db
);
$db_selected = mysql_select_db(
   $db, 
   $link
);

// if ($link->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";
?>