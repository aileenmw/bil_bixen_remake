<?php
//  echo "You win";
require_once 'db.php';



$sql = "SELECT `car_id` ,`model`, `reg_date`, `price` FROM `bil_bixen` WHERE `category_id`=1";
        $data = $mysqli->query($sql);
        
echo '<ul>';        
while ($row = $data->fetch_object()) {
            echo '<li class="list-group-item list-group-item-warning"> '.$row->model . $row->reg_date . ' Price : ' . $row->price .
            '<button onclick="addToList(\''.$row->model.'\');addIdList('.$row->car_id.')" class="list_button">'
                    . '<img src="../assets/icon/list_icon.png" title="Føj til listen">'
                    . '</button></li>';
        }
        echo '</ul>';
        
       