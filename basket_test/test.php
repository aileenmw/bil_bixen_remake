
<?php

session_start();

if(!isset($_SESSION['kurv'])){
    $_SESSION['kurv'] = [];
}


$item1 = array('id'=>'1','navn'=>'Enox Smart Ur SWP55 Gold', 'pris'=>699, 'antal'=>1);
$item2 = array('id'=>'2','navn'=>'Enox Smart Ur SWP55 Silver ', 'pris'=>699, 'antal'=>2);
$item3 = array('id'=>'3','navn'=>'Enox Smart Ur SWP55 Purple ', 'pris'=>699, 'antal'=>3);


function tilfoej($item, $id) {
    $_SESSION['kurv'][$id] = $item;
}

function fjernItem($id) {
    unset($_SESSION['kurv'][$id]);
}

function beregnSubtotal($antal, $stkpris) {
    $subtotal = 0;
    $subtotal = $antal * $stkpris;
    $subtotal = number_format ( $subtotal , 2 , "," ,  "." );
    return $subtotal;
}


tilfoej($item1, 1);
tilfoej($item2, 2);
tilfoej($item3, 3);

// vi indhold
foreach($_SESSION['kurv'] as $items) {
    echo '<br><br>Id: '.$items['id'].', Navn: '.$items['navn'].', Pris: '.$items['pris'].', '
            . 'Antal: '.$items['antal'] . ', Subtotal: '.beregnSubtotal($items['antal'],$items['pris'])."\r\n";
}

echo '<br><br>';
var_dump($_SESSION['kurv']);
fjernItem(2); // id
echo '<br><br>';

foreach($_SESSION['kurv'] as $items) {
    echo '<br><br>Id: '.$items['id'].', Navn: '.$items['navn'].', Pris: '.$items['pris'].', '
            . 'Antal: '.$items['antal'] . ', Subtotal: '.beregnSubtotal($items['antal'],$items['pris'])."\r\n";
}
//var_dump($_SESSION['kurv']);

