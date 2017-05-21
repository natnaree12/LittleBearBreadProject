<?php
// $user = 'root';
// $password = 'root';
// $db = 'LittleBearBread';
// $host = 'localhost';
// $port = 8889;

// $conn = mysql_connect(
//    "$host:$port", 
//    $user, 
//    $password,
//    $db
// );
// $db_selected = mysql_select_db(
//    $db, 
//    $link
// );

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "LittleBearBread";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// if ($link->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";
?>