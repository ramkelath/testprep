<?php
class Question {

      // Properties go here 

     // Persisted properties from DB

     public $question_id;
     public $intro_text;
     public $question_text;
     public $parent_question_id;
     public $area;
     public $correct_answer;
     public $wrong_answer_1;
     public $wrong_answer_2;
     public $wrong_answer_3;
     public $wrong_answer_4;
     public $wrong_answer_5;

      
      // Non-persisted question properties
      public $current_question;

      // Functions go here

      public function __construct($data) {
            $this->question_id = 1;
            $this->question_text = $data['question_text'];
            $this->correct_answer = $data['correct_answer'];
            $this->wrong_answer_1 = $data['wrong_answer_1'];
            $this->wrong_answer_2 = $data['wrong_answer_2'];
            $this->wrong_answer_2 = $data['wrong_answer_3'];
            $this->wrong_answer_4 = $data['wrong_answer_4'];
      }

}