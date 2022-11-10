<?php
ini_set('display_errors', 'On');

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

$car = new Car($mysqli, 'bil_bixen');

$carTypes = $car->$getAllCarTypes($mysqli, 2);

while($row = $carTypes->fetch_object()){
    echo $row->type_id;
    echo '<br>';
    echo $row->type;
}