<?php

//ini_set('display_errors', 1);
session_start();
require_once '../protect.php';

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

echo $action = $_GET['action'] ?? $_POST['action'];
echo $id = $_GET['id'] ?? $_POST['id'];
$confirm = $_GET['confirm'];



if ($action) {

    switch ($action) {
        case 'delete':
            $comment = new Comment($mysqli);
            
            if ($confirm == 1) {
                $sql = "DELETE FROM bil_bixen_kommentarer WHERE id = $id";
                if($mysqli->query($sql)){
                header('location:../index.php?fejl=14');
                }
            } elseif ($confirm == 2) {
               header('Location: ../index.php');
            } else {
                
                header('location:../index.php?id='.$id.'&fejl=12');
            }
            break;
        case 'edit':    
                $sql = "UPDATE `bil_bixen_kommentarer` SET `status`= 2 WHERE `id` = $id";
                    if($mysqli->query($sql)){
                    header('location:../index.php?fejl=11');
                    }
    }
}

