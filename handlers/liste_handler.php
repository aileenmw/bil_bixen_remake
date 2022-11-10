<?php

session_start();

ini_set("display_error", 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();


$action = $_GET['action'] ?? $_POST['action'];

$user_id = $_GET['user_id'];
$car_id = $_GET['car_id'];
$page = $_GET['page'];
if($page == 'details'){
    $page = 'details&id='.$car_id;
}

if ($action) {

    switch ($action) {

        case 'add':
            $liste = new Liste($mysqli);
            $liste->addListe($user_id, $car_id, $page);
//          header('location: ../index.php');
            break;
        case 'delete_liste':
            $liste = new Liste($mysqli);
            $liste->removeListe($user_id);
//            header('location: ../index.php');
            break;
        case 'delete_item':
            $liste = new Liste($mysqli);
            $liste->removeItem($car_id, $user_id);
            echo $result;
            
            break;
        case 'read':
            $liste = new Liste($mysqli);
            $liste->getListe($user_id);
            
    }
}