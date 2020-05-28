<?php

include 'db_connection.php';

$conn = OpenDBConnection();

if ($conn->connect_error) {
 die("Connection error : " . $conn->connect_error);
}

$result = mysqli_query($conn , "SELECT question_text, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_2, wrong_answer_3 FROM  question  LIMIT 10");

$row = $result->fetch_row();

$result->close();

CloseDBConnection($conn);

?>
