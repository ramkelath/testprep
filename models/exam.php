<?php
include_once 'db_gateway.php';

$_SESSION["test_id"] = "1";
$_SESSION["QuestionList"] = array();
//$_SESSION["ReviewList"] = array();
$gateway = new Gateway;
$result = $gateway->exam();
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
