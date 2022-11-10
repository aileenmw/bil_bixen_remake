<?php

$mysqli = new mysqli("localhost", "xai01.wi2", "2paccap2", "xai01_wi2_sde_dk");

if ($mysqli->connect_errno) {
    printf("No connection: %s\n", $mysqli->connect_error);
    exit();
}