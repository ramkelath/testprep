<?php

include_once 'db_gateway.php';
class Report{

public $areas = array();
public $groups = array();


public function __construct($data = null) {

    $gateway = new Gateway;

    $result = $gateway->areas();
    while( $row = $result->fetch_assoc()){
        $this->areas[] = $row["area"];
    }
    sort($this->areas);
    $result= $gateway->groups();
    while( $row = $result->fetch_assoc()){
        $this->groups[] = $row["group_code"];
    }

}

public function get_area_report($user_id) {
    $gateway = new Gateway;
    $result = $gateway->area_report(1, $user_id);
    while ($row = $result->fetch_assoc()) {
        $areas[] = $row;
    }
    return $result;

}

public function get_group_report($user_id) {
    $gateway = new Gateway;
    $result = $gateway->group_report(1, $user_id);
 
    while ($row = $result->fetch_assoc()) {
        $areas[] = $row;
    }
    return $result;

}

public function get_stats($user_id) {
    $gateway = new Gateway;
    $result = $gateway->stats($user_id);

    $area= '';
    while ($row = $result->fetch_assoc()) {
        if ($row["area"] != $area) {
            $area = $row["area"];
        }
        $matrix[$area][$row["group_code"]] = $row["correct"];
    }
    $groups = $this->groups;
    $areas = $this->groups;
    $count  = sizeof($groups);
    foreach ($matrix as $area => $row) {
        $table[$area] = array_fill  (0, $count, 0);
        foreach ($row as $group => $value) {
            for ($i=0; $i<$count; $i++) {
                $score = 0;
                if ($groups[$i] == $group) {
                    $score = $value;
                    $table[$area][$i] = $score;
                }
            }           
        }
    }
    return $table;
}

}