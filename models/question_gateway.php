<?php

include 'db_operations.php';
$select_query =  "SELECT parent_question_id, intro_text,  question_id, question_text, correct_answer, wrong_answer_1, wrong_answer_2, wrong_answer_3, wrong_answer_4, wrong_answer_5 FROM  question";
$result = DBSelect($select_query);

$_SESSION["test_id"] = "1";
$_SESSION["user_id"] = "1";
$_SESSION["QuestionList"] = array();
$index = -1;
while ($row = $result->fetch_assoc()) {
    $Question = new Question($row);
    $Question->randomize_wrong_answers();
    if (is_null($row["parent_question_id"])) { 
        $index++;
    }
    $_SESSION["QuestionList"][$index][] = $Question;
}
?>
