<?php

include_once 'db_gateway.php';
class Exam{

public $questions = array();
public $current;
public $review_questions = array();
public $current_question_group;
public $number_of_questions;
public $start_time;
public $test_id = 1;
public $warning = "";
public $first_pass = true;
public $more_questions = true;

public function __construct($data = null) {

$gateway = new Gateway;
$result = $gateway->exam();
$index = -1;

// Load questions into array
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
  $this->warning = "";
  if ($this->first_pass){
    $this->current_question_group = $this->questions[$this->current];
    if ($this->current == $this->number_of_questions - 1) {
      $this->warning = "You are at the last question!";
      $this->first_pass = false;
    }
  } else {
      // If questions were deferred for future review, show those
      if (isset($_SESSION["ReviewList"]) && sizeof($_SESSION["ReviewList"])) {
          $review_index = array_shift($_SESSION["ReviewList"]);
          $this->current_question_group = $this->questions[$review_index];
          $this->more_questions = sizeof($_SESSION["ReviewList"]);
          if (!$his->more_questions) {
            $this->warning = "You have reached the end of the exam";
          }
       }
  }
  $_SESSION["Exam"] =$this;
}


public function previousQuestion(){
  $this->current--;
  $this->warning = "";
  if ($this->current <= 0) {
    $this->warning = "You are at the first question";
    $this->current = 0;
  }
  $this->current_question_group = $this->questions[$this->current];
  $_SESSION["Exam"] =$this;
}

}
?>
