<?php

ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

$xml = new SimpleXMLElement('<rss version="2.0" encoding="utf-8"></rss>');

// statiske channel data
$xml->addChild('markers');

$sql ="SELECT bil_bixen_afdelinger.id,`name`, `address`, `postal_code`,`town`, `lat`, `lng` ,`Mandag`,`Tirsdag`,`Onsdag`,`Torsdag`,`Fredag`,`Lørdag`,`Søndag`
FROM `bil_bixen_afdelinger` ";
$data = $mysqli->query($sql);

$sql_open = "SELECT `open`,`close` FROM `bil_bixen_openinghours` WHERE `id`=4";


while ($row = $data->fetch_object()) {
    $marker = $xml->markers->addChild('marker');
    //$xmlTable1->elementYouWantAttrsFor->attributes()->attrName = newAttrValue;
    $marker->addAttribute('id', $row->id);
    $marker->addAttribute('name', $row->name);
    $marker->addAttribute('address', $row->address);
    $marker->addAttribute('postal_code', $row->postal_code);
    $marker->addAttribute('town', $row->town);
    $marker->addAttribute('lat', $row->lat);
    $marker->addAttribute('lng', $row->lng);
    $marker->addAttribute('Mandag', $row->Mandag);
    $marker->addAttribute('Tirsdag', $row->Tirsdag);
    $marker->addAttribute('Onsdag', $row->Onsdag);
    $marker->addAttribute('Torsdag', $row->Torsdag);
    $marker->addAttribute('Fredag', $row->Fredag);
    $marker->addAttribute('Lørdag', $row->Lørdag);
    $marker->addAttribute('Søndag', $row->Søndag);
    $marker->addAttribute('type', 'nytOgBrugt');

//print_r($xml);
}


if ($xml->asXML('dealership.xml')) {
    header('Location:dealership.xml');
}

