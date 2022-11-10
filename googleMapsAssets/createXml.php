<?php

ini_set('display_errors', 1);

header("Content-type: text/xml");

$mysqli = new PDO('mysql:host=localhost;dbname=xai01_wi2_sde_dk', 'xai01.wi2' ,'2paccap2');

$xmlout = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$xmlout .= "<markers>";
$stmt = $mysqli->prepare("SELECT `name`, `address`, `postal_code`, `lat`, `lng`, day, substr(open,1,5) as open,substr(close,1,5) as close
FROM `bil_bixen_afdelinger` 
INNER JOIN bil_bixen_weekdays
on bil_bixen_afdelinger.day_id = bil_bixen_weekdays.id
INNER JOIN bil_bixen_open
ON bil_bixen_afdelinger.id_open = bil_bixen_open.id
INNER JOIN bil_bixen_close
ON bil_bixen_afdelinger.id_close = bil_bixen_close.id");
$stmt->execute();

//$data = $mysqli->query($sql);

while ($row = $stmt->fetch()) {
//    $marker = $xml->markers->addChild('marker');
//    $marker->addAttribute('name', utf8_decode($row->name));
//    $marker->addAttribute('address', utf8_decode($row->address));
//    $marker->addAttribute('postal_code', $row->postal_code);
//    $marker->addAttribute('lat', $row->lat);
//    $marker->addAttribute('lng', $row->lng);
//    $marker->addAttribute('day', $row->day);
//    $marker->addAttribute('open', $row->open);
//    $marker->addAttribute('close', $row->close);
//    $marker->addAttribute('type', 'nytOgBrugt');
//    $xmlout .= "\t<country code=\"" . $row['code'] . "\">\n";
    $xmlout .="\t<marker>\n";
    $xmlout .= "\t\t<name>" . utf8_encode(row['name']) . "</name>\n";
    $xmlout .= "\t\t<address>" . utf8_encode($row['address']) . "</address>\n";
    $xmlout .= "\t\t<postal_code>" . $row['postal_code'] . "</postal_code>\n";
    $xmlout .= "\t\t<lat>" . $row['lat'] . "</lat>\n";
    $xmlout .= "\t\t<lng>" . $row['lng'] . "</lng>\n";
    $xmlout .= "\t\t<day>" . $row['day'] . "</day>\n";
    $xmlout .= "\t\t<open>" . $row['open'] . "</open>\n";
    $xmlout .= "\t\t<close>" . $row['close'] . "</close>\n";
    $xmlout .= "\t\t<type>nytOgBrugt</type>\n";
    $xmlout .="\t</marker>\n";
}
    $xmlout .= "\t</markers>\n";
    echo $xmlout;


//if ($xml->asXML('dealership.xml')) {
//    header('Location:dealership.xml', '_blank');
//}

////////////////
//$stmt->execute();
//
//while (($row = $stmt->fetch())){
//   $xmlout .="\t<country code=\"".$row['code']."\">\n";
//   $xmlout .="\t\t<name>".$row['name']."</name>\n";
//   $xmlout .="\t\t<continent>".$row['continent']."</continent>\n";
//   $xmlout .="\t</country>\n";
//}
//
//$xmlout .="</countries>";
//
//echo $xmlout;
?>