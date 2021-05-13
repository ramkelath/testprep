<?php
include_once 'db_operations.php';
class Gateway {
    public function login($login, $password){
        $select_query =  "SELECT id, level FROM user WHERE username = ? AND password = ?";
        $credentials = array($login, $password);
        $result = DBQuery($select_query, $credentials);
        return $result;
    }
    public function exam() {
        $select_query =  "SELECT parent_question_id, intro_text,  question_id, question_text, correct_answer, type,
                          wrong_answer_1, wrong_answer_2, wrong_answer_3, wrong_answer_4, wrong_answer_5, area, group_code
                          FROM 
                          (
                            SELECT * FROM 
                            (
                            (SELECT * FROM question 
                            WHERE group_code = 'Cntl'
                            LIMIT 100)
                            UNION
                            (SELECT * FROM question 
                            WHERE COALESCE(group_code, 'Close') = 'Close'
                            LIMIT 28
                            ) 
                            UNION
                            (SELECT * FROM question 
                            WHERE group_code = 'Exec'
                            LIMIT 124) 
                            UNION
                            (SELECT * FROM question 
                            WHERE group_code = 'Plan'
                            LIMIT 96)
                            UNION
                            (SELECT * FROM question 
                            WHERE area = 'Init'
                            LIMIT 52)
                            ) e
                            WHERE e.question_id NOT IN
                            (SELECT question_id FROM answer WHERE user_id = 1
                            AND test_id = (SELECT MIN(test_id) FROM answer WHERE user_id = 1))
                            ORDER BY RAND()
                          LIMIT 40) source
                          ORDER BY CASE WHEN parent_question_id = 0 THEN question_id ELSE parent_question_id END, question_id";
        $result = DBSelect($select_query);
        return $result;
    }

    public function groups() {
        $select_query =  "SELECT DISTINCT COALESCE(group_code,'Null') AS group_code FROM question ORDER BY group_code";
        $result = DBSelect($select_query);
        return $result;
    }

    public function areas() {
        $select_query =  "SELECT DISTINCT area FROM question ORDER BY area";
        $result = DBSelect($select_query);
        return $result;
    }

    public function stats($user_id) {
        $select_query =  "SELECT COALESCE(group_code, 'Null') group_code, area, count(correct) AS correct 
                          FROM answer JOIN question ON answer.question_id = question.question_id 
                          WHERE user_id = ? 
                          GROUP BY 1, area 
                          ORDER BY 1, area";
        $users = array($user_id);
        $result = DBQuery($select_query, $users);
        return $result;
    }

}

?>
