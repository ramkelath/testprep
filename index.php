<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include_once(dirname(__DIR__)."/testprep/models/db_gateway.php");
session_start();
$error_message = '';
// Create a new exam list if we don't have one yet
if ( !isset($_SESSION["Exam"] )) {
    $Exam = new Exam();
    $_SESSION["Exam"] = $Exam;
} else {
    $Exam= $_SESSION["Exam"];
}
if (isset($_GET["reset"])) {
    session_destroy();
    header('Location: /testprep/index.php');
}

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $gateway = new Gateway;
    $result = $gateway->login($login, $password);         
    if ($result && $row = $result->fetch_assoc()) {
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["role"] = $row["level"];
    } else {
        $error_message = 'Login unsuccessful, please try again';
    }
    
}

if (isset($_SESSION["user_id"])) {
    include(dirname(__DIR__)."/testprep/views/homepage.php");
} else {
    include(dirname(__DIR__)."/testprep/views/loginpage.php");
}

?>
<br>
