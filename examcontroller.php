<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once(dirname(__DIR__)."/testprep/models/question.php");
require_once(dirname(__DIR__)."/testprep/models/exam.php");

session_start();
$more_questions= true;
$current = 0;

// Create a new exam if we don't have one yet
if ( !isset($_SESSION["ExamStarted"] )) {
    $Date = new DateTime();
    $Exam = new Exam();
    $_SESSION["Exam"] = $Exam;
    //$QuestionGroup =  $_SESSION["QuestionList"][$current][0];
    $QuestionGroup = $Exam->questions[$current];
    $_SESSION["CurrentPage"] = $current;
    $_SESSION["TotalQuestions"] = sizeof($Exam->questions);
    $_SESSION["FirstPass"] = true;
    $_SESSION["ExamStarted"] = $Date->getTimestamp();
} else {
    $current = $_SESSION["CurrentPage"];
    $length = $_SESSION["TotalQuestions"];
}

// Process previous question and move to next requested question
if ($_GET && $_GET["direction"]) {

    $direction = $_GET["direction"];
    if (isset($_GET["review"])) {
        $_SESSION["ReviewList"][] = $current;
    }

    // Check for the end of the exam or the beginning

    if ($_SESSION["FirstPass"]) {
        if ($direction == 'Next') {
            $current ++;
        } else {
            $current --;
        }
        if (($current == $_SESSION["TotalQuestions"])) {
            $warning = "You are at the last question!";
            $current = $_SESSION["CurrentPage"];
        } elseif ($current > $_SESSION["TotalQuestions"])  {
            if (isset($_SESSION["ReviewList"]) && sizeof($_SESSION["ReviewList"])){
                $current = array_shift($_SESSION["ReviewList"]);
                $more_questions = sizeof($_SESSION["ReviewList"]);
                $_SESSION["FirstPass"] = false;
            }
        } elseif ($current <  0) {
            $warning = "You are at the first question!";
            $current = 0;
            $_SESSION["CurrentPage"] = $current;
        }
    } else {

        if (isset($_SESSION["ReviewList"])){
            $current = array_shift($_SESSION["ReviewList"]);
            if (sizeof($_SESSION["ReviewList"])) {
                $more_questions = false;
            }

        } else {
            $warning = "You have completed the test!";
            $current = $_SESSION["CurrentPage"];
        }
    }

    $_SESSION["CurrentPage"] = $current;
    $current = $_SESSION["CurrentPage"];
} else {

        $current = 0;
        $Date = new DateTime();
        $_SESSION["CurrentPage"] = $current;
        $_SESSION["FirstPass"] = true;
        $_SESSION["ExamStarted"] = $Date->getTimestamp();


}
$QuestionGroup =  $_SESSION["Exam"]->questions[$current];
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
