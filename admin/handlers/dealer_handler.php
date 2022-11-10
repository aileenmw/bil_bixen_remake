<?php

ini_set('display_errors', 1);

session_start();
require_once '../protect.php';

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();
echo $action = $_GET['action'] ?? $_POST['action'];
$id = $_GET['id'] ?? $_POST['id'];
$name = $_GET['name'] ?? $_POST['name'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$town = $_POST['town'];
$username = $_POST['username'];
//$password = password_hash($password, PASSWORD_DEFAULT);
$confirm = $_GET['confirm'] ?? $_POST['confirm'];

if ($action) {

    switch ($action) {
        case 'delete':
            $dealer = new User($mysqli, 'bil_bixen_afdelinger');
            header('location:../index.php?fejl=16&name='.$name.'&id='.$id);

            if ($confirm == 1) {
                $dealer->delete('bil_bixen_afdelinger', 'id', $id);
                header('location:../index.php?fejl=4');
            } elseif ($confirm == 2) {
                header('Location: ../index.php');
                echo 'Not confirmed';
            } else {
//                header('location:../index.php?fejl=7&name=' . $name . '&id=' . $id . '');
            }
            break;
        case 'edit':
            $updateDealer = new User($mysqli, 'bil_bixen_afdelinger');
            
            if (count($_POST) == 0) {
                header('location:../index.php?fejl=1');
                
            } else {
                $fields_and_values = [];

                if ($name) {
                    $arName = ['name' => $name];
                    $fields_and_values = array_merge($fields_and_values, $arName);
                }
                if ($address) {
                    $arAddress= ['address' => $address];
                    $fields_and_values = array_merge($fields_and_values, $arAddress);
                }
//                if ($role) {
//                    $arRole = ['role_id' => $role];
//                    $fields_and_values = array_merge($fields_and_values, $arRole);
//                }
                if ($postal_code) {
                    $arPostalCode= ['postal_code' => $postal_code];
                    $fields_and_values = array_merge($fields_and_values, $arPostalCode);
                }
                if ($town) {
                    $arTown= ['town' => $town];
                    $fields_and_values = array_merge($fields_and_values, $arTown);
                }
                if ($username) {
                    $arUsernamee= ['username' => $username];
                    $fields_and_values = array_merge($fields_and_values, $arUsernamee);
                }
                if ($password) {
                    $arPassword= ['password' => $password];
                    $fields_and_values = array_merge($fields_and_values, $arPassword);
                }
                $id = ['id' => $id];

                if ($updateDealer->update($fields_and_values, 'bil_bixen_afdelinger', $id)) {
                    header('location:../index.php?fejl=6');
                } else {
                    header('location:../index.php?fejl=6');
                }
            }

            break;
        case 'add':
            //INSERT INTO `bil_bixen_afdelinger`( `name`, `address`, `postal_code`, `town`) VALUES (`name`,`address`,`postal_code`,`town`)

            if (!$name || !$address || !$postal_code || !$town) {
            $message = 'Udfyld venligst alle felter';
                header('location:../index.php?fejl=1');  // fejl=1 bliver sendt med => get[fejl] , if( fejl = 1){....
            } else {
                $createDealer = new User($mysqli, 'bil_bixen_afdelinger');

                $fields_and_values = [
                    'name' => $name,
                    'address' => $address,
                    'postal_code' => $postal_code,
                    'town' => $town
                ];
print_r($fields_and_values);
                $createDealer->save($fields_and_values, 'bil_bixen_afdelinger');
                header('Location: ../index.php?fejl=5');
//        }
            }
            break;
        case 'read':


            break;
    }
}