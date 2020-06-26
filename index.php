<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
session_start();
if (isset($_GET["reset"])) {
    session_destroy();
}

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    #include_once(dirname(__DIR__)."/testprep/models/login_gateway.php");
    #die(var_dump($_SESSION["user_id"]));
    $_SESSION["user_id"] = 1;
}

if (isset($_SESSION["user_id"])) {
    include(dirname(__DIR__)."/testprep/views/homepage.php");
} else {
    include(dirname(__DIR__)."/testprep/views/loginpage.php");
}

?>
<br>
