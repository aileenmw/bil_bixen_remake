<?php
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});


$mysqli = UniversalConnect::doConnect();

$xml = new SimpleXMLElement('<rss version="2.0" encoding="utf-8"></rss>'); 

// statiske channel data
$xml->addChild('channel'); 
$xml->channel->addChild('name', 'Bil Bixen dealerdip deatail');

$sql = "SELECT `name`, `address`, `postal_code`, `lat`, `lng`, day, open, close 
FROM `bil_bixen_afdelinger` 
INNER JOIN bil_bixen_weekdays
on bil_bixen_afdelinger.day_id = bil_bixen_weekdays.id
INNER JOIN bil_bixen_open
ON bil_bixen_afdelinger.id_open = bil_bixen_open.id
INNER JOIN bil_bixen_close
ON bil_bixen_afdelinger.id_close = bil_bixen_close.id";

$data = $mysqli->query($sql);

while ($row = $data->fetch_object()) { 
    $item = $xml->channel->addChild('item'); 
    $item->addChild('name', utf8_decode($row->name)); 
    $item->addChild('address', utf8_decode($row->address));
    $item->addChild('postal_code', $row->postal_code);
    $item->addChild('lat', $row->lat);
    $item->addChild('lng', $row->lng);
    $item->addChild('day', $row->day);
    $item->addChild('open', $row->open);
    $item->addChild('close', $row->close);
} 
//print_r($xml);

if($xml->asXML('dealership.xml'))
{
	header('Location:dealership.xml','_blank');
}

