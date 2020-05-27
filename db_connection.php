<?php

function OpenDBConnection()
   {
   $dbhost = "127.0.0.1";
   $dbuser = "root";
   $dbpass = "linering";
   $db = "sakila";

   $conn = new mysqli ($dbhost, $dbuser, $dbpass, $db );
   return $conn;
   }

function CloseDBConnection($conn)
  {
  $conn -> close();
  }
