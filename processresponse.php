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
    if (isset($_POST['question'.$j])){
       if( $_POST['question'.$j]==$_POST['correct'.$j]) { $correct = 1; }
        $question_id = $_POST['question_id'.$j];
        $row = array(NULL, $_POST['user_id'], $_POST['test_id'], $_POST['question_id'.$j], $_POST['question'.$j], $correct);
        $Answer = new Answer($row);
        include(dirname(__DIR__)."/testprep/models/saveanswer.php");
    }
}
if ($_POST['Next']) {
    $direction = 'Next';
} else {
    $direction = 'Back';
}
if (isset($_POST["review"])) {
    $review = "&review=Y";
} else {
    $review = "";
}

header('Location: '."/testprep/examcontroller.php?direction=".$direction.$review);
exit();
?>
<br>
