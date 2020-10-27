<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once(dirname(__DIR__)."/testprep/models/question.php");
require_once(dirname(__DIR__)."/testprep/models/exam.php");

session_start();
$current = 0;

// Create a new exam if we don't have one yet
if ( !isset($_SESSION["Exam"] )) {
    $Date = new DateTime();
    $Exam = new Exam();
    $Exam->current = $current;
    $Exam->current_question_group = $Exam->questions[$current];
    $length = sizeof($Exam->questions);
    $Exam->number_of_questions =  $length;
    $Exam->start_time = $Date->getTimestamp();
    $Exam->first_pass = true;
    $_SESSION["Exam"] = $Exam;
} else {
    $Exam = $_SESSION["Exam"];
    $current = $Exam->current;
    $length = $Exam->number_of_questions;
}

// Process previous question and move to next requested question
if ($_GET && $_GET["direction"]) {
    $direction = $_GET["direction"];

    // Save this page for later review if requested
    if (isset($_GET["review"])) {
        $_SESSION["ReviewList"][] = $current;
    }

    if ($direction == 'Next') {
      $Exam->nextQuestion();
    } else {
      $Exam->previousQuestion();
    }

}

//$QuestionGroup = $Exam->current_question_group;
$Question = $Exam->current_question_group;
$warning = $Exam->warning;
$more_questions = $Exam->more_questions;
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
