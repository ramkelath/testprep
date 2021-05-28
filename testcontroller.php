<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php

session_start();
require_once(dirname(__DIR__)."/testprep/models/question.php");
require_once(dirname(__DIR__)."/testprep/models/exam.php");
require_once(dirname(__DIR__)."/testprep/models/test.php");

$current = 0;
$exam = unserialize($_SESSION["exam"]);


// Create a new test if we don't have one yet
if ( !isset($_SESSION["Test"] )) {
    $Date = new DateTime();
    $Test = new Test($exam->assessment);
    $Test->current = $current;
    $Test->current_question_group = $Test->questions[$current];
    $length = sizeof($Test->questions);
    $Test->number_of_questions =  $length;
    $Test->start_time = $Date->getTimestamp();
    $Test->first_pass = true;
    $_SESSION["Test"] = serialize($Test);
} else {
    $Test = unserialize($_SESSION["Test"]);
    $current = $Test->current;
    $length = $Test->number_of_questions;
}

// Process previous question and move to next requested question
if ($_GET && $_GET["direction"]) {
    $direction = $_GET["direction"];

    // Save this page for later review if requested
    if (isset($_GET["review"])) {
        $_SESSION["ReviewList"][] = $current;
    }

    if ($direction == 'Next') {
      $Test->nextQuestion();
    } else {
      $Test->previousQuestion();
    }

}

//$QuestionGroup = $Test->current_question_group;
$Question = $Test->current_question_group;
$warning = $Test->warning;
$more_questions = $Test->more_questions;
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
