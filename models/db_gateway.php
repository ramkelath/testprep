<?php
include_once 'db_operations.php';
class Gateway {
    public function login($login, $password){
        $select_query =  "SELECT id FROM user WHERE username = ? AND password = ?";
        $credentials = array($login, $password);
        $result = DBQuery($select_query, $credentials);
        return $result;
    }
    public function exam() {
        $select_query =  "SELECT parent_question_id, intro_text,  question_id, question_text, correct_answer, type,
                          wrong_answer_1, wrong_answer_2, wrong_answer_3, wrong_answer_4, wrong_answer_5, area, group_code
                          FROM  question
                          WHERE question_id BETWEEN 225 AND 235
                          ORDER BY CASE WHEN parent_question_id = 0 THEN question_id ELSE parent_question_id END, question_id";
        $result = DBSelect($select_query);
        return $result;
    }

}

?>
