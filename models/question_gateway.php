<?php
include 'db_operations.php';
$select_query =  "SELECT question_text, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_3, wrong_answer_4 FROM  question";
$result = DBSelect($select_query);
$row = $result->fetch_assoc();
?>
