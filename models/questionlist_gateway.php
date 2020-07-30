<?php

include_once 'db_operations.php';
$select_query =  "SELECT area, parent_question_id, intro_text,  question_id, question_text, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_3, wrong_answer_4, wrong_answer_5 FROM  question";
$result = DBSelect($select_query);

$_SESSION["page_last_qeustion_id"] = "1";
$MaintainQuesionList = array();

$index = -1;
while ($row = $result->fetch_assoc()) {
    $Question = new Question($row);
    $MaintainQuestionList[] = $Question;
}


?>
