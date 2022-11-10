<?php
ini_set('display_errors', 1);

//echo $delete_id = $_POST['delete_id'];
//echo '<br>';
//
//$deleteUser = new User($mysqli,'bil_bixen_users'); 
//
//if ($id) {
//    if ($deleteUser->deleted('users', 'id', $delete_id)) {
//
//        echo '<br>The user with the id ' . $delete_id . ' is deleted';
//    } else {
//        echo 'Something went wrong.';
//    }
//}
$action = $_GET['action'] ?? $_POST['action'];

$id = $_GET['id'] ?? $_POST['id'];

switch ($action) {
    case 'delete':


        break;
    case 'edit':


        break;
    case 'add':


        break;
    case 'read':


        break;

}