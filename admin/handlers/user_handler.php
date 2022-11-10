<?php

//ini_set('display_errors', 1);
session_start();
require_once '../protect.php';

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();

$action = $_GET['action'] ?? $_POST['action'];
$id = $_GET['id'] ?? $_POST['id'];
$username = $_GET['username'] ?? $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$role = $_POST['role'];
$confirm = $_GET['confirm'] ?? $_POST['confirm'];

if ($action) {

    switch ($action) {
        case 'delete':
            $user = new User($mysqli, 'bil_bixen_users');
            header('location:../index.php?fejl=3&name=' . $username . '');

            if ($confirm == 1) {
                $user->delete('bil_bixen_users', 'user_id', $id);
                header('location:../index.php?fejl=4');
            } elseif ($confirm == 2) {
//                header('Location: ../index.php');
                echo 'Not confirmed';
            } else {
//                header('location:../index.php?fejl=7&name=' . $username . '&userid=' . $id . '');
            }
            break;
        case 'edit':
            $updateUser = new User($mysqli, 'bil_bixen_users');
            if (count($_POST) == 0) {
                header('location:../index.php?fejl=1');
            } else {
                $fields_and_values = [];

                if ($username) {
                    $arUsername = ['username' => $username];
                    $fields_and_values = array_merge($fields_and_values, $arUsername);
                }
                if ($email) {
                    $arEmail = ['email' => $email];
                    $fields_and_values = array_merge($fields_and_values, $arEmail);
                }
                if ($role) {
                    $arRole = ['role_id' => $role];
                    $fields_and_values = array_merge($fields_and_values, $arRole);
                }
                if ($password) {
                    $arPassword = ['password ' => $password];
                    $fields_and_values = array_merge($fields_and_values, $arPassword);
                }
//            print_r($fields_and_values);

                $id = ['user_id' => $id];

                if ($updateUser->update($fields_and_values, 'bil_bixen_users', $id)) {
                    header('location:../index.php?fejl=6');
                } else {
                    header('location:../index.php?fejl=7');
                }
            }

            break;
        case 'add':

            if (!$username || !$email || !$password) {
//            $message = 'Udfyld venligst alle felter';
                header('location:../index.php?fejl=1');  // fejl=1 bliver sendt med => get[fejl] , if( fejl = 1){....
            } else {
                $createUser = new User($mysqli, 'bil_bixen_users');

                $fields_and_values = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role
                ];

                $createUser->save($fields_and_values, 'bil_bixen_users');
                header('Location: ../index.php?fejl=5');
//        }
            }
            break;
        case 'read':


            break;
    }
}