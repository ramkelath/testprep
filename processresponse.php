<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
require_once(dirname(__DIR__)."/testprep/models/answer.php");
$correct = 0;
for ($j=1; $j<= $_POST['length']; $j++) {
    if ($_POST['question'.$i]==$_POST['correct']) { $correct = 1; }
    $row = array(NULL, $_POST['user_id'], $_POST['test_id'], $_POST['question_id'.$j], $_POST['question'.$j], $correct);
    $Answer = new Answer($row);
    include(dirname(__DIR__)."/testprep/models/saveanswer.php");
}
if ($_POST['question_id'] == 2) {
    die("Thank you for taking the test!");
}
header('Location: '."/testprep/examcontroller.php?NextQuestion=Y");
exit();
?>
<br>
