<!----You answered: 
<?php 
die ("Got here C");
die(var_dump($_SESSION));
if ($Question = next($QuestionList)) {
    var_dump($Question)."<br>";
    include(dirname(__DIR__)."/testprep/views/questionpage.php");
} else {
    echo $_REQUEST['questionx'] . "<br>";
}
?>