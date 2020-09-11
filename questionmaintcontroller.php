<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include(dirname(__DIR__)."/testprep/models/question.php");
session_start();
if ($_POST and isset($_POST["edit"])) {
    include(dirname(__DIR__)."/testprep/views/questionform.php");  
} elseif ($_POST and isset($_POST["update"])) {
    include(dirname(__DIR__)."/testprep/models/updatequestion.php"); 
} else {
    require_once(dirname(__DIR__)."/testprep/models/questionlist_gateway.php");
    include(dirname(__DIR__)."/testprep/views/questionlist.php");
}

?>
<br>
