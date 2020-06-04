<?php

function OpenDBConnection() {
   $dbhost = "127.0.0.1";
   $dbuser = "root";
   $dbpass = "linering";
   $db = "testprep";

   $conn = new mysqli ($dbhost, $dbuser, $dbpass, $db );
   return $conn;
   }

function CloseDBConnection($conn) {
  $conn -> close();
  }

function DBSelect($query) {
   
   $conn = OpenDBConnection();

   if ($conn->connect_error) {
      die("Connection error in DBSelect : " . $conn->connect_error);
   }

   #$result = mysqli_query($conn ,$query);
   $result = $conn->query($query);

   return $result;
}

function DBInsert($query, $params) {
   $conn = OpenDBConnection();

   if ($conn->connect_error) {
    die("Connection error in DBInsert: " . $conn->connect_error);
   }
   $stmt = $conn->prepare($query);
   /* bind parameters for markers */
   if ($stmt) {
      $types = str_repeat("s", count($params)); 
      $stmt->bind_param($types, ...$params);
      /* execute query */
      $stmt->execute();
   }
   CloseDBConnection($conn);
}
