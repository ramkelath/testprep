<?php

function OpenDBConnection() {
   $dbhost = "127.0.0.1";
   $dbuser = "phpuser";
   $dbpass = "Poi2020%";
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

   $result = $conn->query($query);

   return $result;
}

function DBInsert($query, $params) {
   $conn = OpenDBConnection();

   if ($conn->connect_error) {
    die("Connection error in DBInsert: " . $conn->connect_error);
   }
   $stmt = $conn->prepare($query);
   /* bind parameters */
   if ($stmt) {
      $types = str_repeat("s", count($params)); 
      $stmt->bind_param($types, ...$params);

      if ($stmt->error) {
         die($stmt->error);
      } else {
         $stmt->execute();
      }
   }
   CloseDBConnection($conn);
}

function DBQuery($query, $params) {
   $conn = OpenDBConnection();
   if ($conn->connect_error) {
    die("Connection error in DBQuery " . $conn->connect_error);
   }
   $stmt = $conn->prepare($query);
   if ( false===$stmt ) {
      printf('prepare failed: %s', htmlspecialchars($conn->error));
  }
   /* bind parameters */
   if ($stmt) {
      $types = str_repeat("s", count($params)); 
      $stmt->bind_param($types, ...$params);
      $stmt->execute();
      if ($stmt->error) {
         die($stmt->error);
      } else {
         return $stmt->get_result();
      }
   }
   CloseDBConnection($conn);
}
