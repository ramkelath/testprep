<?php

include 'db_connection.php';

$conn = OpenDBConnection();

if ($conn->connect_error) {
 die("Connection error : " . $conn->connect_error);
}

$insert_string = "INSERT INTO answer (answer_id, test_id, user_id, question_id, ";
$insert_string .= " response, correct) values (?, ?, ?, ?, ?, ?) ";

$answer_id = 1;
$user_id = 1;
$test_id = 1;
$question_id = 1;
$response = $_POST['questionx'];
$correct = True;
$stmt = $conn->prepare($insert_string);
/* bind parameters for markers */
if ($stmt) {
    $stmt->bind_param("ssssss", $answer_id, $test_id, $user_id, $question_id, $response, $correct);

    /* execute query */
    $stmt->execute();
}

CloseDBConnection($conn);

?>
