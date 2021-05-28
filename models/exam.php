<?php

include_once 'db_gateway.php';

class Exam{

  public $intro_page_text;
  public $number_of_questions;

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

}
?>
