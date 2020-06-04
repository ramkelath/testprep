<?php
include 'db_operations.php';
$insert_string = "INSERT INTO answer (answer_id, test_id, user_id, question_id, ";
$insert_string .= " response, correct) values (?, ?, ?, ?, ?, ?) ";
$answer_id = 1;
$user_id = 1;
$test_id = 1;
$question_id = 1;
$response = $_POST['questionx'];
$correct = True;
$values = array($answer_id, $test_id, $user_id, $question_id, $response, $correct);
$saved = DBInsert($insert_string, $values);
?>
