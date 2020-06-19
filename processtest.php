<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
require_once(dirname(__DIR__)."/testprep/models/answer.php");

$correct = 0;
if ($_POST['questionx']==$_POST['correct']) { $correct = 1; }
$row = array($_POST['answer_id'], $_POST['user_id'], $_POST['test_id'], $_POST['question_id'], $_POST['questionx'], $correct);
$Answer = new Answer($row);


include(dirname(__DIR__)."/testprep/models/saveanswer.php");
if ($_POST['question_id'] == 2) {
    die("Thank you for taking the test!");
}
header('Location: '."/testprep/examcontroller.php?NextQuestion=".$_POST['question_id']);
exit();
?>
<br>
