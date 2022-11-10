<?php
die('ldfkgb');
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

$sql ="SELECT `id`,`name`, `address`, `postal_code`,`town`, `lat`, `lng` ,`Mandag`,`Tirsdag`,`Onsdag`,`Torsdag`,`Fredag`,`Lørdag`,`Søndag`
FROM `bil_bixen_afdelinger`";

$data = $mysqli->query($sql);

$row = $data->fetch_object();

$sql1 ="SELECT `Mandag`,`Tirsdag`,`Onsdag`,`Torsdag`,`Fredag`,`Lørdag`,`Søndag`
FROM `bil_bixen_afdelinger` ";

$data1 = $mysqli->query($sql1);

print_r($row1) = $data1->fetch_assoc();
 
$sql2 = "";



//$weekdays = 'Mandag, Tirsdag, Onsdag, Torsdag, Fredag, Lørdag, Søndag';
//$opening_hours = array($row->Mandag,$row->Tirsdag,$row->Onsdag,$row->Torsdag, $row->Fredag,$row->Lørdag, $row->Søndag);
//
//
//
//$sql_open = "SELECT `open`,`close` FROM `bil_bixen_openinghours` WHERE `id`=4";