<?php
include_once 'db_operations.php';

if (isset($_POST['parent_question_id']) and $_POST[parent_question_id] != '') {
    $parent_question_id = $_POST['parent_question_id'];
} else {
    $parent_question_id = NULL;
}


if (isset($_POST['intro_text'])) {
    $intro_text = $_POST['intro_text'];
} else {
    $intro_text = NULL;
}

$update_string = "UPDATE question 
                  SET parent_question_id = ?,
                      area = ?,  
                      intro_text = ?,
                      question_text  = ?,
                      correct_answer = ?,
                      wrong_answer_1 = ?,
                      wrong_answer_2 = ?,
                      wrong_answer_3 = ?,
                      wrong_answer_4 = ?,
                      wrong_answer_5 = ?
                      WHERE question_id = ?";

$values = array($parent_question_id, $_POST['area'], $_POST['intro_text'], $_POST['question_text'], 
                $_POST['correct_answer'], $_POST['wrong_answer_1'], $_POST['wrong_answer_2'],
                $_POST['wrong_answer_3'], $_POST['wrong_answer_4'], $_POST['wrong_answer_5'],  $_POST['question_id']);
$updated = DBQuery($update_string, $values);
header('Location: '.'/testprep/questionmaintcontroller.php');

?>