<?php
include 'db_operations.php';
$insert_string = "INSERT INTO answer (answer_id, test_id, user_id, question_id, 
                    response, correct) values (?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE response = ?, correct = ? ";

$values = array($Answer->answer_id, $Answer->test_id, $Answer->user_id, $Answer->question_id, $Answer->response, $Answer->correct, $Answer->response, $Answer->correct);

$saved = DBInsert($insert_string, $values);
?>
