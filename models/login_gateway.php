<?php

include_once 'db_operations.php';
$select_query =  "SELECT user_id FROM user WHERE username = ? AND password = ?";
$credentials = array($login, $password);
$result = DBQuery($select_query, $credentials);
if ($result ) {
  $row = $result->fetch_assoc();
  $_SESSION["user_id"] = $row["id"];
}
?>
