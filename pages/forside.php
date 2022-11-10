<?php
//$car_id = 47; $user_id = 21;
//$sql_tjek = "SELECT COUNT(*) as c FROM `bil_bixen_huskeliste` WHERE `bil_id`= $car_id AND `user_id` = $user_id";
//       $data_tjek = $mysqli->query($sql_tjek);
//       $row = $data_tjek->fetch_object();
//       
//       $c = $row->c;
//       
//       if($c > 0){
//           echo 'bilen er allerede på listen din og $c er '.$c ;
//       }else{
//           echo 'ok';
//           $sql = "INSERT INTO `bil_bixen_huskeliste`(`bil_id`, `user_id`) VALUES ( $car_id, $user_id)";
//           $mysqli->query($sql);
//    }
//die('hertil');
$selected_type = null;
$number_of_cars_to_show = 1;

if (isset($_GET['type_id'])) {
    $selected_type = $_GET['type_id'] ?? null;
    $number_of_cars_to_show = false;
}
?>
<article>
    <div class="col1">
        <h1 class="h1_query">Hvad er bilbixen?</h1>
        <h2 class="h2_query">En bedre løsning til dit bilsalg</h2>
        <h3 class="h3_query">Èn samlet portal til både private og virk- <br>
            somheder. Nemt, hurtigt og lige til - du <br>
            opnår altid den højeste pris på markedet.
        </h3>
    </div>
    <div class="col2">
        <h1 class="h1_query">Her får du altid den bedste pris for din bil</h1>
        <h2 class="h2_query">Bilbixen den smarte løsning</h2>
        <h3 class="h3_query">Din bil vises i hele Danmark så snart<br> din annoncen er oprettet. 
            På den måde<br>får du altid den bedste pris for din bil. </h3>
    </div>  
</article>
<div class="how_it_works">
    <h1 style="color:#fff;">
        Hvordan virker bilbixen?
    </h1>
    <div class="icons">
        <div class="icon">
            <img src="assets/icon/icon1.png" alt="camera icon">
            <p>1. Opret en annonce</p>
        </div>
        <div class="operator">+</div>
        <div class="icon">
            <img src="assets/icon/icon2.png" alt="camera icon">
            <p>2. Vises i hele DK</p>
        </div>
        <div class="operator">=</div>
        <div class="icon">
            <img src="assets/icon/icon3.png" alt="camera icon">
            <p>3. Bedste pris</p>
        </div>
    </div>
</div>
<div class="h">
    Dagens super tilbud
</div>

<main class="main_front"> ´
    <?php
    $car = new Car($mysqli, 'bil_bixen');
//as class
    $category = new Category($mysqli, 'bil_bixen');
    $allTypes = $category->getAllCarTypes($mysqli, $selected_type);
    // as function
//    $allTypes = getAllCarTypes($mysqli, $selected_type);

    while ($type_row = $allTypes->fetch_object()) {

        $type_id = $type_row->type_id;
        $type = $type_row->type;

        $rand_cars = $car->getRandCars($mysqli, $type_id, 1);

        while ($car_row = $rand_cars->fetch_object()) {

            $model = $car_row->model;
            $car_id = $car_row->car_id;
            $price = $car_row->price;
            $price = number_format($price, 0, ",", ".");
            // $price = Car::getPriceType($price);
            $km = $car_row->km;
            $km = number_format($km, 0, ",", ".");
            $year = substr($car_row->reg_date, 0, 4);
            $img = $car_row->img;
            $comment = new Comment($mysqli, 'bil_bixen');
            $count = $comment->messageCount($mysqli, $car_id);
            ?>
            <div class="col">
                <div class="border">
                    <a href="index.php?page=details&id=<?php echo $car_id; ?>">                     
                        <div class="img_container">
                            <?php
                            if ($img) {
                                echo '<img src="assets/img/bil/' . $img . '" alt="bil">';
                            } else {
                                echo '<img src="assets/img/bil/' . $car_id . '.jpg" alt="bil">';
                            }
                            ?>
                        </div>
                        <div class="query_flex">
                            <div class="pris"><p><?php echo $price; ?></div>
                            <div class="messages">
                                <img src="assets/img/talebobble.png" class="bubble">               
                                <p class="nmb"><?php echo $count; ?></p>
                            </div>
                        </div>
                        <div class="om_bilen">
                            <p class="model"><?php echo $model; ?></p>
                            <p>Årgang -  <?php echo $year; ?></p>
                            <p>KM -  <?php echo $km . ' '; ?>
                        </div>
                        <div class="info_link" style="position: static;">
                            Se alle informationer         
                        </div>
                    </a> 
                
                <a href="handlers/liste_handler.php?action=add&car_id=<?php echo $car_id; ?>&user_id=<?php echo $user_id; ?>&page=forside" class="list_icon">
                    <img src="assets/icon/list_icon.png"  alt="list icon" title="Føj tl liste" style="display: <?php echo $display; ?>">
                </a>
                    </div> <!-- div class="border"-->
                <?php
            }
            ?>
            <!--            <div class="find_bil" style="border: none; margin:10px; text-align: center;">
                            <a href="?page=find_bil&type_id=<?php // echo $type_id;       ?>"><h3 style="margin:0;"><?php // echo $type;       ?></h3></a>       
                        </div>-->

        </div>

        <?php
    }
    ?> 
</main>
