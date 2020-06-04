<?php
include 'db_operations.php';
$insert_query =  "SELECT question_text, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_2, wrong_answer_3 FROM  question";
$result = DBSelect($insert_query);
#die(print_r($result));
$row = $result->fetch_array(MYSQLI_NUM);
?>
