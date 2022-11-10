<?php


class Category extends DatabaseTable {

    private $table_name = 'bil_bixen_type';
    private $type_id, $type;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function save($fields_and_values, $table_name) {
        $to_be_inserted = [
            'type' => $this->type,
            'type_id' => $this->type_id
        ];
        return parent::save($fields_and_values, $this->table_name);
    }

//
//    public function delete() {
//        return parent::delete($this->table_name, $this->type_id, 'type_id');
//    }
//
//    public function update() {
//        $to_be_updated = [
//            'type' => $this->type
//        ];
//        $clause = ['type_id' => $this->type_id];
//        return parent::update($to_be_updated, $this->table_name, $clause);
//    }
//
//    public function getType_id() {
//        return $this->type_id;
//    }
//
//    public function getType() {
//        return $this->type;
//    }
//
//    public function setType($type) {
//        $this->type = $type;
//    }
//
//    function getAllCarTypes($mysqli, $type = null) {
//        $sql = "SELECT type_id, type FROM `bil_bixen_type`";
//        if ($type) {
//            $sql .= " WHERE type_id = $type";
//        }
//        $result = $mysqli->query($sql);
//
//        if ($result) {
//            return $result;
//        }
//    }


    function getAllCarTypes($mysqli, $type = null) {
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
