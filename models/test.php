<?php

include_once 'db_gateway.php';
class Test{

public $questions = array();
public $current = 1;
public $review_questions = array();
public $current_question_group;
public $number_of_questions;
public $start_time;
public $test_id = 1;
public $user_id;
public $warning = "";
public $first_pass = true;
public $more_questions = true;

public function __construct($assessment = null) {
  if  ($assessment == 'Practice') {
    $this->load_practice_questions();
  } else {
    $this->load_questions($assessment);
  }

}

public function load_practice_questions() {
  $gateway = new Gateway;
  $areas = array('Plan','Scope','Risk');

  foreach ($areas as $area) {
    $results[$area] = $gateway->practice($area);
  }

  $i = 0;
  do {
    foreach ($areas as $area) {
      $nextrow = $results[$area]->fetch_assoc();
      if ($nextrow) {
        $Question = new Question($nextrow);
        $Question->randomize_wrong_answers();
        $this->question[] = $Question;
      } else {
        if (($key = array_search($area, $areas)) !== FALSE) {
          unset($areas[$key]);
          break;
      }
    }
    }
    $i = $i+1;
    } while ($i < 101);;
}

public function load_questions($exam = null) {

  $gateway = new Gateway;
  $result = $gateway->test();
  $index = -1;

  // Load questions into array

  while ($row = $result->fetch_assoc()) {
      $Question = new Question($row);
      $Question->randomize_wrong_answers();
      $this->questions[] = $Question;
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
            $this->warning = "You have reached the end of the test";
          }
       }
  }
  $_SESSION["Test"] =serialize($this);
}


public function previousQuestion(){
  $this->current--;
  $this->warning = "";
  if ($this->current <= 0) {
    $this->warning = "You are at the first question";
    $this->current = 0;
  }
  $this->current_question_group = $this->questions[$this->current];
  $_SESSION["Test"] =$this;
}

}
?>
