<?php

include 'db_connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = OpenDBConnection();

if ($conn->connect_error) {
 die("Connection error : " . $conn->connect_error);
}
else {
    printf("Connection succeeded!\n");
}

printf("Starting<br>");
//$conn->select_db("sakila");

$result = mysqli_query($conn , "SELECT first_name, last_name FROM actor LIMIT 10");

while ($row = $result->fetch_row())
 {
    printf("$row[0] $row[1]<br>");
   //printf( "$row['first_name'] $row['last_name']");
 }
$result->close();


CloseDBConnection($conn);

?>
