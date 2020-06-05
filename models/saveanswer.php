<?php
include 'db_operations.php';
$insert_string = "INSERT INTO answer (answer_id, test_id, user_id, question_id, 
                    response, correct) values (?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE response = ?, correct = ? ";
$answer_id = (int) $_POST['answer_id'];
$user_id = (int) $_POST['user_id'];
$test_id = (int) $_POST['test_id'];
$question_id = (int) $_POST['question_id'];
$response = $_POST['questionx'];
$correct = 0;
if ($response ==$_POST['correct']) { $correct = 1; }
$values = array($answer_id, $test_id, $user_id, $question_id, $response, $correct, $response, $correct);
$saved = DBInsert($insert_string, $values);
?>
