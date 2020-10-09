<?php

include_once 'db_gateway.php';
class Exam{

public $questions = array();

public function __construct($data = null) {

//$_SESSION["test_id"] = "1";


$gateway = new Gateway;
$result = $gateway->exam();
$index = -1;


while ($row = $result->fetch_assoc()) {
    $Question = new Question($row);
    $Question->randomize_wrong_answers();
    if ($row["parent_question_id"] == 0) {
        $index++;
    }
    $this->questions[$index][] = $Question;

 }
}
}
?>
