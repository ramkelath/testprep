<?php
class Answer {

      // Properties go here 

     // Public properties
     public $answer_id;
     public $user_id;
     public $test_id;
     public $question_id;
     public $response;
     public $correct;


      
      // Non-persisted  properties
 
      // Functions go here

      public function __construct($data) {
            $this->answer_id = $data[0];
            $this->user_id = $data[1];
            $this->test_id = $data[2];
            $this->question_id = $data[3];
            $this->response= $data[4];
            $this->correct = $data[5];
      }

}