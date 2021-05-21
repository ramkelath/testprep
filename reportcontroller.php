<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require_once(dirname(__DIR__)."/testprep/models/report.php");
if (!isset($_SESSION["user_id"])){
    $_SESSION["user_id"] = 1;
};
$report = new Report();
$area_report = $report->get_area_report($_SESSION["user_id"]);
$group_report = $report->get_group_report($_SESSION["user_id"]);
include(dirname(__DIR__)."/testprep/views/reportpage.php");
?>
<br>
