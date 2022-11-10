<?php

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();
?>

<main> 
    <?php
    // intet limit på antal, når type er valgt - ellers limit 3
    $selected_type = null;
    $number_of_cars = 3;

    if (isset($_GET['type_id'])) {
        $selected_type = $_GET['type_id'];
        $number_of_cars = false;
    }

    $category = new Category($mysqli, 'bil_bixen');
    $allTypes = $category->getAllCarTypes($mysqli, $selected_type);

    while ($type_row = $allTypes->fetch_object()) {

        $type_id = $type_row->type_id;
        $type = $type_row->type;
        ?>
        <div class="find_bil">
            <a href="?page=find_bil&type_id=<?php echo $type_row->type_id; ?>"><h3><?php echo $type_row->type; ?></h3></a>       
        </div>
        <?php
        $type_id = $type_row->type_id;
        ?>

        <div class="cars">

            <?php
            $car = new Car($mysqli, 'bil_bixen');
            $cars = $car->getCars($mysqli, $type_id, $number_of_cars);
            while ($car = $cars->fetch_object()) {
                $car_id = $car->car_id ?? "";
                $price = $car->price ?? null;
                //$price = $price ? Car::getPriceType($price) : 0;
                $km = $car->km;
                $km = number_format($km, 0, ",", ".");
                $year = substr($car->reg_date, 0, 4);
                $img = $car->img;
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
                                <div class="messages"><img src="assets/img/talebobble.png">
                                    <p class="nmb"><?php echo $count ?></p>
                                </div>
                            </div>
                            <div class="om_bilen">
                                <p class="model"><?php echo $car->model; ?></p>
                                <p>Årgang - <?php echo $year; ?></p>
                                <p>KM - <?php echo $km . ' '; ?>km</p>
                            </div>

                            <div class="info_link">
                                Se alle informationer         
                            </div>
                        </a>
                    </div>
                    <a href="handlers/liste_handler.php?action=add&car_id=<?php echo $car_id; ?>&user_id=<?php echo $user_id; ?>&page=find_bil"  class="list_icon">
                        <img src="assets/icon/list_icon.png"  alt="list icon" title="Føj tl liste" style="display: <?php echo $display; ?>">
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>  

</main>
