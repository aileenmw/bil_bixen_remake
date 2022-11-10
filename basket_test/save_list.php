<?php
//ini_set('display_errors', 1);
require_once 'db.php';

        $items = $_POST['list'];
        $items = '\''.$items.'\'';
        
        $sql = "INSERT INTO `bil_bixen_basket`(`user_id`, `list`) VALUES ( 5 , $items)";
        if($mysqli->query($sql)){
            echo '<h2>Din liste er blevet gemt i databasen</h2> ';
        }else{
            echo 'Noget gik galt';
        }
        
        
        
        
//        $array = explode(",",$items);
//        print_r($array);

//       if($items){
//           
//           foreach ($array as $value) {
//               
//               
//               echo 'Value : '.$value;
//           }
//           
//       } else {echo 'Blabla!!';}
       
       
       
        