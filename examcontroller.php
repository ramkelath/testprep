<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include(dirname(__DIR__)."/testprep/models/question.php");
session_start();
$more_questions= true;

// Create a new exam if we don't have one yet 
if ( !isset($_SESSION["ExamStarted"] )) {
    require_once(dirname(__DIR__)."/testprep/models/exam.php");
    $current = 0;
    $Date = new DateTime();
    $QuestionGroup =  $_SESSION["QuestionList"][$current];
    $_SESSION["CurrentPage"] = $current;
    $_SESSION["TotalQuestions"] = sizeof($_SESSION["QuestionList"]);
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
    
    if ($_SESSION["FirstPass"]) {
        if ($direction == 'Next') {
            $current ++;
        } else {
            $current --;
        }  
        if (($current >= 300)) {
            if (isset($_SESSION["ReviewList"]) && sizeof($_SESSION["ReviewList"])){
                $current = array_shift($_SESSION["ReviewList"]);
                $more_questions = sizeof($_SESSION["ReviewList"]);
                $_SESSION["FirstPass"] = false;
            } else {
                $warning = "You are at the last question!";
                $current = $_SESSION["CurrentPage"];
            }
        } elseif ($current <  0) {
            $warning = "You are at the first question!";
            $current = 0;
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

    // Check for the end of the exam or the beginning
   

    $_SESSION["CurrentPage"] = $current;
    $current = $_SESSION["CurrentPage"];
} else {

        $current = 0;
        $Date = new DateTime();
        $_SESSION["CurrentPage"] = $current;
        $_SESSION["FirstPass"] = true;
        $_SESSION["ExamStarted"] = $Date->getTimestamp();
    

}
//die(var_dump($_SESSION["QuestionList"]));
$QuestionGroup =  $_SESSION["QuestionList"][-1][$current];
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
