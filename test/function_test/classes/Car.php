<?php

//ini_set('display_errors', 1);
include_once 'UniversalConnect.php';

class Car {

    private $table_name = 'bil_bixen';
    private $id, $model, $reg_date, $doors, $km, $price, $category_id;

    function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

//    function getAllCarTypes($mysqli, $type = null)
      function getAllCarTypes($mysqli, $type)      {
        $sql = "SELECT type_id, type FROM `bil_bixen_type`";
        if ($type) {
            $sql .= " WHERE type_id = $type";
        }
        $result = $mysqli->query($sql);

        if ($result) {
            return $result;
        }
    }

}
