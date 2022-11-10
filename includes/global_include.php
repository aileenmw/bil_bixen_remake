<?php
session_start();
//error_reporting(E_ALL);
//ini_set("display_error", 1);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();

require "includes/functions.php";

