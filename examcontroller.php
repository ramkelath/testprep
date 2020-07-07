<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
require_once(dirname(__DIR__)."/testprep/models/question.php");
require_once(dirname(__DIR__)."/testprep/models/question_gateway.php");
if ($_GET && $_GET["direction"]) {
    $current = $_SESSION["CurrentPage"];
    $length = $_SESSION["TotalQuestions"];
    $direction = $_GET["direction"];
    if ($direction == 'Next') {
        $current ++;
    } else {
        $current --;
    }
    if ($current == $length || $current <  0) {
        die( "Thank you for completing the test!");
    } else  {
        $QuestionGroup =  $_SESSION["QuestionList"][$current];
        $_SESSION["CurrentPage"] = $current;
    }
} else  {
    require_once(dirname(__DIR__)."/testprep/models/question.php");
    require_once(dirname(__DIR__)."/testprep/models/question_gateway.php");
    $_SESSION["test_id"] = "1";
    $current = 0;
    $QuestionGroup =  $_SESSION["QuestionList"][$current];
    $_SESSION["CurrentPage"] = $current;
    $_SESSION["TotalQuestions"] = sizeof($_SESSION["QuestionList"]);
    if ( ! isset($_SESSION["ExamStarted"] )) {
        $Date = new DateTime();
        $_SESSION["ExamStarted"] = $Date->getTimestamp();
    }
}
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
