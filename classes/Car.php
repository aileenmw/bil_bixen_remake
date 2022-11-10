<?php

//ini_set('display_errors', 1);

class Car extends DatabaseTable {

    private $table_name = 'bil_bixen';
    private $id, $model, $reg_date, $doors, $km, $price, $category_id;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function create($fields_and_values, $tablename) {
        $to_be_inserted = [
            'model' => $this->model,
            'reg_date' => $this->reg_date,
            'doors' => $this->doors,
            'km' => $this->km,
            'price' => $this->price,
            'category_id' => $this->category_id
        ];
        return parent::save($fields_and_values, $this->table_name);
    }

    public function deleted($table_name, $id_field, $id_value) {
        return parent::delete($this->table_name, $this->id, 'id');
    }

    public function updated($fields_and_values, $table_name, $clause) {
        $to_be_updated = [
            'model' => $this->model,
            'reg_date' => $this->reg_date,
            'doors' => $this->doors,
            'km' => $this->km,
            'price' => $this->price,
            'category_id' => $this->category_id
        ];
        $clause = ['id' => $this->id];
        return parent::update($to_be_updated, $this->table_name, $clause);
    }

    public function read_car($car_id) {
        $sql = "SELECT  `model`, `reg_date`, `doors`, `km`, `price`, `category_id` FROM `bil_bixen` WHERE `car_id` = $car_id";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_object();
        $this->cat_id = $row->category_id;
        $this->model = $row->model;
        $this->reg_date = $row->reg_date;
        $this->doors = $row->doors;
        $this->km = $row->km;
        $this->price = $row->price;
    }

//   
    public function getId() {
        return $this->car_id;
    }

    public function getModel() {
        return $this->model;
    }

    public function getGet_date() {
        return $this->red_date;
    }

    public function getDoors() {
        return $this->doors;
    }

    public function getKm() {
        return $this->km;
    }

    protected function getPrice() {
        return $this->price;
    }

    protected function getCat_id() {
        return $this->category_id;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setReg_date($reg_date) {
        $this->reg_date = $reg_date;
    }

    public function setDoors($doors) {
        $this->doors = $doors;
    }

    public function setKm($km) {
        $this->km = $km;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCat_id($cat_id) {
        $this->category_id = $cat_id;
    }

    protected function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function getRandCars($mysqli, $type_id, $limit = false) {        
        $dealer_price = ' TRUNCATE((price/1.25)*0.90, 2) AS price ';
        $price = (isset($_SESSION['level']) && $_SESSION['level'] == 2) ? $dealer_price : ' price ';
        //$price = number_format($price, 0, ",", ".");

        if ($limit) {
            $limit = "LIMIT " . $limit;
        }

        $sql = "SELECT `car_id`,`model`,`reg_date`,`doors`,`km`, " . $price . ", img FROM `bil_bixen`  WHERE `category_id`= $type_id  ORDER BY RAND() $limit";
        $result = $mysqli->query($sql);

        if ($result) {
            return $result;
        }
    }

    // public static function getPriceType() {
        
    //     $dealer_price = ' TRUNCATE((price/1.25)*0.90, 2) AS price ';
    //     $price = (isset($_SESSION['level']) && $_SESSION['level'] == 2) ? $dealer_price : ' price ';
    //     $price = number_format($price, 0, ",", ".");

    //     return $price;
    // }

//    function getcars($mysqli, $type_id, $limit = false) {
//
//        $price = number_format($price, 0, ",", ".");
//        $dealer_price = ' TRUNCATE((price/1.25)*0.90, 2) AS price ';
//        $price = (isset($_SESSION['level']) && $_SESSION['level'] == 2) ? $dealer_price : ' price ';
//
//        if ($limit) {
//            $limit = "LIMIT " . $limit;
//        }
//    }

    function getCars($mysqli, $type_id, $limit = false) {

        $dealer_price = ' TRUNCATE((price/1.25)*0.90, 2) AS price ';
        $price = (isset($_SESSION['level']) && $_SESSION['level'] == 2) ? $dealer_price : ' price ';
       // $price = number_format($price, 0, ",", ".");

        if ($limit) {
            $limit = "LIMIT " . $limit;
        }

        $sql = "SELECT `car_id`,`model`,`reg_date`,`doors`,`km`, $price, `img` FROM `bil_bixen`  WHERE `category_id`= $type_id $limit";

        $result = $mysqli->query($sql);

        if ($result) {
            return $result;
        }
    }

}
