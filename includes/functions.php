<?php

//$sql = "SELECT * FROM `bil_bixen` WHERE `car_id`= $car_id";

function getItemById($mysqli, $query){
$result = $mysqli->query($query);
if ($result->num_rows > 0 ){
$data = $result->fetch_assoc();
}
else{
$data = "Denne Id findes ikke i databasen.";
}
return $data;
}



