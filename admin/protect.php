<?php

if(!isset($_SESSION['logget']) or $_SESSION == NULL){
    header('Location:../index.php?page=login');
}
    