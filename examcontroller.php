<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once(dirname(__DIR__)."/testprep/models/question.php");
include(dirname(__DIR__)."/testprep/models/question_gateway.php");
#die(var_dump($result));
$Question = new Question($row);
$Question->randomize_wrong_answers();
include(dirname(__DIR__)."/testprep/views/questionpage.php");
?>
<br>
