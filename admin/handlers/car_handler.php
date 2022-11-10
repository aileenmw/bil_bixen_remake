<?php


$is_file = false;

if(!empty($_FILES["myimage"]['name'])){
    $is_file = true;
}


ini_set('display_errors', 1);
session_start();
require_once '../protect.php';

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();

$action = $_GET['action'] ?? $_POST['action'];
$confirm = $_GET['confirm'];
$id = $_GET['id'] ?? $_POST['id'];

$model = $_POST['model'];
$reg_date = $_POST['reg_date'];
$doors = $_POST['doors'];
$km = $_POST['km'];
$price = $_POST['price'];
$category_id = $_POST['cat_id'];

$filename = $_FILES["myimage"]["name"];
$microtime = microtime();
$microtime_arr = explode(' ', $microtime);
$filename = $microtime_arr[1] . '_' . $filename;
$img_path = '../../assets/img/bil/' . $filename;
$tmp_name = $_FILES["myimage"]['tmp_name'];

echo '<br>This is filename : ' . $filename . '<br>';
if ($action) {

    switch ($action) {
        case 'delete':
            $car = new Car($mysqli, 'bil_bixen');

            header('location:../index.php?id=' . $id . '&fejl=15');

            if ($confirm == 1) {
                $car->deleted('bil_bixen', 'car_id', $id);
                header('location:../index.php?fejl=4');
            } elseif ($confirm == 2) {
                header('location: ../index.php');
            }
//             else {
////                header('location:../index.php?fejl=13');
//            }
            break;

        case 'edit':
            $updateCar = new Car($mysqli, 'bil_bixen');

            $filename = $_FILES["myimage"]["name"];
            $microtime = microtime();
            $microtime_arr = explode(' ', $microtime);
            $filename = $microtime_arr[1] . '_' . $filename;
            $img_path = '../../assets/img/bil/' . $filename;
            $tmp_name = $_FILES["myimage"]['tmp_name'];
            
            $fields_and_values = [];

            if ($model) {
                $arModel = ['model' => $model];
                $fields_and_values = array_merge($fields_and_values, $arUsername);
            }
            if ($reg_date) {
                $arReg_date = ['reg_date' => $reg_date];
                $fields_and_values = array_merge($fields_and_values, $arReg_date);
            }
            if ($doors) {
                $arDoors = ['doors' => $doors];
                $fields_and_values = array_merge($fields_and_values, $arDoors);
            }
            if ($km) {
                $arKm = ['km' => $km];
                $fields_and_values = array_merge($fields_and_values, $arKm);
            }
            if ($price) {
                $arPrice = ['price' => $price];
                $fields_and_values = array_merge($fields_and_values, $arPrice);
            }         
            if ($is_file) {
                $arImg = ['img' => $filename];
                $fields_and_values = array_merge($fields_and_values, $arImg);
            }
         
            $id = ['car_id' => $id];

            if (count($_POST) == 0) {
                header('location:../index.php?fejl=1');
            } elseif ((count($_POST) > 0) || ($filename)) {
                $updateCar->updated($fields_and_values, 'bil_bixen', $id);
//                header('location:../index.php?fejl=6');
            } elseif ($filename) {            
                $updateCar->updated($fields_and_values, 'bil_bixen', $id);
                move_uploaded_file($tmp_name, $img_path);
                header('location:../index.php?fejl=6');
            } else {
                header('location:../index.php?fejl=7');
            }
            break;

        case 'add':
            $createCar = new Car($mysqli, 'bil_bixen');

//            OR ( count($_FILES) > 0)) {
//            $filename = $_FILES["myimage"]["name"];
//            $microtime = microtime();
//            $microtime_arr = explode(' ', $microtime);
//            $filename = $microtime_arr[1] . '_' . $filename;
//            $img_path = '../../assets/img/bil/' . $filename;
//            $tmp_name = $_FILES["myimage"]['tmp_name'];

            $fields_and_values = [
                'model' => $model,
                'reg_date' => $reg_date,
                'doors' => $doors,
                'km' => $km,
                'price' => $price,
                'category_id' => $category_id,
                'img' => $filename
            ];

            if (!$model || !$reg_date || !$doors || !$km || !$price || !$category_id || !$filename) {
                header('location:../index.php?fejl=1');
            } else {
                $createCar->create($fields_and_values, 'bil_bixen');
                move_uploaded_file($tmp_name, $img_path);
                
// //               https://paulund.co.uk/resize-image-class-php
//                
//                
//                $resize = new ResizeImage($img_path);
//                $resize->resizeTo(100, 100, 'exact');
//                $resize->saveImage("../../assets/img/bil/thumbs/lille_$filename");
              
                header('location:../index.php?fejl=5');
            }

            break;
        case 'read':


            break;
    }
}    