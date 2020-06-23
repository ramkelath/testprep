<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
require_once(dirname(__DIR__)."/testprep/models/question.php");
require_once(dirname(__DIR__)."/testprep/models/question_gateway.php");

if ($_GET && $_GET["NextQuestion"]) {
    $QuestionPage = next($_SESSION["QuestionList"]);
    if ($QuestionPage == false) {
        die( "Thank you for completing the test!");
    }
} else  {
    require_once(dirname(__DIR__)."/testprep/models/question.php");
    require_once(dirname(__DIR__)."/testprep/models/question_gateway.php");
    $_SESSION["test_id"] = "1";
    $current = 0;
    $QuestionPage =  current($_SESSION["QuestionList"]);
}

include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
