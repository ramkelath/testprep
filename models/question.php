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
     public $answer = [];

      // Non-persisted question properties
      // public $current_question;

      // Functions go here

      public function __construct($data = null) {
            if ($data) {
                  if ($data['area']) {$this->area = $data['area'];}
                  $this->intro_text = $data['intro_text'];
                  $this->question_id = $data['question_id'];
                  $this->parent_question_id = $data['parent_question_id'];
                  $this->question_text = $data['question_text'];
                  $this->correct_answer = $data['correct_answer'];
                  $this->answer[0]= $data['correct_answer'];
                  $this->answer[1]= $data['wrong_answer_1'];
                  $this->answer[2]= $data['wrong_answer_2'];
                  $this->answer[3] = $data['wrong_answer_3'];
                  if ($data['wrong_answer_4']) {$this->answer[4]= $data['wrong_answer_4'];}
                  if ($data['wrong_answer_5']) {$this->answer[5]= $data['wrong_answer_5'];}
                  $this->wrong_answer_1 = $data['wrong_answer_1'];
                  $this->wrong_answer_2 = $data['wrong_answer_2'];
                  $this->wrong_answer_3 = $data['wrong_answer_3'];
                  if ($data['wrong_answer_4']) {$this->wrong_answer_4 = $data['wrong_answer_4'];}
                  if ($data['wrong_answer_5']) {$this->wrong_answer_5 = $data['wrong_answer_5'];}
            }

      }

      public function randomize_wrong_answers() {
            shuffle($this->answer);
            $insert = rand(0,2);
            if (in_array($this->correct_answer, array_slice($this->answer,0,3)) == false) { 
                  $this->answer[$insert] = $this->correct_answer;
            }
      }

}