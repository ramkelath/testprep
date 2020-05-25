<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

  $route = $_SERVER['REQUEST_URI'];
  die($route);
	switch ($route) {
    case '/':
        include(dirname(__DIR__)."/testprep/views/homepage.php");
        break;
    case '':
        include(dirname(__DIR__)."/testprep/views/homepage.php");
        break;
    case '/testprep/test':
        include(dirname(__DIR__)."/testprep/views/testpage.php");
        break;
    default:
        http_response_code(404);
        include(dirname(__DIR__)."/testprep/views/errorpage.php");
        break;
    }
?>
<br>
