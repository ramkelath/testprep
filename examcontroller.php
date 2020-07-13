<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include(dirname(__DIR__)."/testprep/models/question.php");
session_start();
// Create a new exam if we don't have one yet 
if ( !isset($_SESSION["ExamStarted"] )) {
    require_once(dirname(__DIR__)."/testprep/models/exam.php");
    $current = 0;
    $QuestionGroup =  $_SESSION["QuestionList"][$current];
    $_SESSION["CurrentPage"] = $current;
    $_SESSION["TotalQuestions"] = sizeof($_SESSION["QuestionList"]);
    $Date = new DateTime();
    $_SESSION["ExamStarted"] = $Date->getTimestamp();
}

// Process previous question and move to next requested question
if ($_GET && $_GET["direction"]) {
    $current = $_SESSION["CurrentPage"];
    $length = $_SESSION["TotalQuestions"];
    $direction = $_GET["direction"];
    if (isset($_GET["review"])) {
        $_SESSION["ReviewList"][] = $current;
    }

    if ($direction == 'Next') {
        $current ++;
    } else {
        $current --;
    }

    // Checm for the end of the exam or at the beginning
    if ($current == $length){
        $warning = "You are at the last question!";
        $current = $length - 1;
        //die(var_dump($_SESSION["ReviewList"]));
    } elseif ($current <  0) {
        $warning = "You are at the first question!";
        $current = 0;
    } 
    $QuestionGroup =  $_SESSION["QuestionList"][$current];
    $_SESSION["CurrentPage"] = $current;

}

include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
