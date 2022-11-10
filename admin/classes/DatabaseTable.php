<?php

include_once 'UniversalConnect.php';
//ini_set('display_errors', 1);

class DatabaseTable {

    protected $mysqli;

    function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    protected function save($fields_and_values, $table_name) {
        $fields = array_keys($fields_and_values);
        $fields = implode(',', $fields);
        $fields;
        $values = "'" . implode("','", $fields_and_values) . "'";
        $values;

        $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";
        $this->mysqli->query($sql);
//      insert_id — Returns the auto generated id used in the latest query.        
//        return $this->mysqli->insert_id;
    }

    protected function update($fields_and_values, $table_name, $clause) {
        $temp = "";
        foreach ($fields_and_values as $field => $value) {
            $temp .= " $field = $value,";
        }
        $temp = rtrim($temp, ',');
        echo '<br>';
        echo '$temp on DatabaseTable : ' . $temp;
        echo '<br>';

//      array_keys() returns the keys, numeric and string, from the array.
//      array = $clause        
        $identifying_fields = array_keys($clause);  //generelt alle keys...her : $clause = ['id' => $this->id]; array_keys = id;
        echo '$identifying_field : ';
        echo $identifying_field = $identifying_fields[0];   //  den første key, dvs id
        echo '<br>$identifying_value :';
        echo $identifying_value = $clause[$identifying_field]; //her: 
        echo '<br>' . $sql = "UPDATE $table_name 
            SET  $temp
            WHERE $identifying_field = $identifying_value";
        $this->mysqli->query($sql);
//      Returns the number of rows affected by the last INSERT, UPDATE, REPLACE or DELETE query.
//        return $this->mysqli->affected_rows;
    }

    protected function delete($table_name, $id_field, $id_value) {
        echo $sql = "DELETE FROM $table_name WHERE $id_field = $id_value ";
        return $this->mysqli->query($sql);
    }

}
