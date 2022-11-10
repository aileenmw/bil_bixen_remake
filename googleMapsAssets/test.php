<?php

//ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

// statiske channel data
$xml = new SimpleXMLElement('<rss version="2.0" encoding="utf-8"></rss>');
$xml->addChild('opens');

$sql_forhandler = "SELECT `id`, `name` FROM `bil_bixen_afdelinger` ";
$data_dealer = $mysqli->query($sql_forhandler);

while ($row_dealer = $data_dealer->fetch_object()) {
    $name = $row_dealer->name;


    $sql_days = " SELECT `day` FROM `bil_bixen_weekdays`";
    $data_days = $mysqli->query($sql_days);


    while ($row = $data_days->fetch_object()) {
      $day = $row->day;



        $sql_array[] = $sql = "SELECT  `name`,$day,`open`, `close` "
                . "FROM `bil_bixen_afdelinger` "
                . "INNER JOIN bil_bixen_openinghours ON bil_bixen_afdelinger.$day = bil_bixen_openinghours.id "
                . "WHERE `name`= '$name'";
    }
}
//print_r($sql_array);

$arrlength = count($sql_array);

for ($x = 0; $x < $arrlength; $x++) {
    
    $open = $xml->opens->addChild('open');
//    echo $x;
    $sql = $sql_array[$x];
//    print_r($sql);
    $data = $mysqli->query($sql);
    
    $row = $data->fetch_object();
    echo $row->name. $row->open;
    $open->addAttribute('name', $row->name);  
    $open->addAttribute('open', $row->open);
    $open->addAttribute('close', $row->close);
}


if($xml->asXML('openinghours.xml'))
{
	header('Location:openinghours.xml');
}
