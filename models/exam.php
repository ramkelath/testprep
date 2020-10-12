<?php

include_once 'db_gateway.php';
class Exam{

public $questions = array();
public $current;
public $review_questions = array();
public $current_review_question;
public $number_of_questions;
public $exam_length_review;
public $start_time;
public $test_id = 1;
public $warning = "";
public $first_pass = true;
public $more_questions = true;

public function __construct($data = null) {

//$_SESSION["test_id"] = "1";


$gateway = new Gateway;
$result = $gateway->exam();
$index = -1;


while ($row = $result->fetch_assoc()) {
    $Question = new Question($row);
    $Question->randomize_wrong_answers();
    if ($row["parent_question_id"] == 0) {
        $index++;
    }
    $this->questions[$index][] = $Question;
 }
}

public function nextQuestion() {
  $this->current++;
  if ($this->current == $this->number_of_questions - 1) {
      $this->warning = "You are at the last question!";
      // $current = $_SESSION["CurrentPage"];
  } /* elseif ($this->current > $this->number_of_questions)  {
      if (isset($_SESSION["ReviewList"]) && sizeof($_SESSION["ReviewList"])){
          $this->current = array_shift($_SESSION["ReviewList"]);
          //$more_questions = sizeof($_SESSION["ReviewList"]);
          $_SESSION["FirstPass"] = false;
      } */
}

public function previousQuestion(){
  $this->current--;
  if ($this->current <= 0) {
    $this->warning = "You are at the first question";
    $this->current = 0;
  }
}
}
?>
