<?php

include_once 'db_gateway.php';

class Exam{

  public $questions = array();
  public $intro_page_text;
  public $current;
  public $review_questions = array();
  public $current_question_group;
  public $number_of_questions;
  public $start_time;
  public $test_id = 1;
  public $warning = "";
  public $first_pass = true;
  public $more_questions = true;
  public $assessment = "";

  public function __construct($assessment= 'PMP') {

  $gateway = new Gateway;
  $result = $gateway->exam($assessment);

  // Load data into array
  while ($row = $result->fetch_assoc()) {
    // do the loading
    $this->intro_page_text = $row['intro_page_text'];
  }
  $this->assessment = $assessment;

  }
  $this->current_question_group = $this->questions[$this->current];
  $_SESSION["Test"] =$this;
}

}
?>
