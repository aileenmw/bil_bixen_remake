<?php
//ini_set('display_errors', 1);
$display_comment = 'none';
$car_id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
$message = '';
$dealer_price = ' TRUNCATE((price/1.25)*0.90, 2) AS price ';
$price = (isset($_SESSION['level']) && $_SESSION['level'] == 2) ? $dealer_price : ' price ';

$sql = "SELECT `car_id`, `model`,  SUBSTRING(`reg_date`, 1, 4) AS year, `doors`, `km`, $price, `img`, `category_id` FROM `bil_bixen`  WHERE `car_id`= $car_id";
$data = $mysqli->query($sql);
$row = $data->fetch_object();
$model = $row->model;
$reg = $row->year;
$km = $row->km;
$price = $row->price;
$img = $row->img;

$price = number_format($price, 0, ",", ".");
$km = number_format($km, 0, ",", ".");

$name = $_POST['name'] ?? "";
$email = $_POST['email']?? "";
$comment = $_POST['comment'] ?? null;
$theComment = $comment ? addslashes($comment) : "";
$status = 1;

$sql = "INSERT INTO `bil_bixen_kommentarer`( `message`, `name`, `email`, `biler_id`,`status`) 
            VALUES ( '$theComment', '$name', '$email', $car_id, 1)";
if (isset($_POST['submit'])) {
    if (empty($comment) or empty($name) or empty($email)) {
        $message = 'Vær venlig at udfylde alle felter!';
    } else {
        if ($mysqli->query($sql)) {
            $message = 'Din kommentar er indsendt';
        }
    }
}

$query = "SELECT `name`, `time`, `message` FROM `bil_bixen_kommentarer` WHERE `biler_id`= $car_id AND `status` =  2";
$result = $mysqli->query($query);
?>

<div class="detail_wrapper">
    <h2 style="color: red;"><?php echo $message; ?></h2>
    <h3>Detaljer 
        <a href="handlers/liste_handler.php?action=add&car_id=<?php echo $car_id; ?>&user_id=<?php echo $user_id; ?>&page=details"  class="list_icon">
            <img src="assets/icon/list_icon.png"  alt="list icon" title="Føj tl liste" style="display: <?php echo $display; ?>">
        </a>
   </h3>
    <div class="detail_col">
        <div class="detail_img">
            <?php
            if ($img) {
                echo '<img src="assets/img/bil/' . $img . '" alt="bil">';
            } else {
                echo '<img src="assets/img/bil/' . $car_id . '.jpg" alt="bil">';
            }
            ?>
        </div>
        <div class="details">
            <p><?php echo $model; ?></p>
            <p>Årgang<br><span id="year"><?php echo $reg; ?></span></p>
            <p>KM<br><span id="KM"><?php echo $km; ?></span></p>
            <p>Pris<br><span id="pris"><?php echo $price; ?></span></p>
        </div>
    </div>
</div> <!-- detail_wrapper-->
<article class="detail_comments">
    <h1>Kommentarer</h1>
    <div class="query_flex  the_message">
        <div class="comments">

            <?php
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $time = $row['time'];
                $message = $row['message'];
                if($message){
                 $bg_color = '#fff';
                }
                ?>
                <div class="comment" style="background-color : <?php echo $bg_color; ?>;">
                    <h3><?php echo $name ?></h3>
                    <span id="date"><?php echo $time ?></span>
                    <p><?php echo $message; ?></p>
                </div>

                <?php
            }
            ?>
        </div> 
        <form id="send_comment" action="" method="post">
            <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
            <input type="hidden" name="id" value="<?php echo $car_id; ?>">
            <input type="text" name="name" placeholder="Navn"><br>
            <input type="email" name="email" placeholder="E-mail"><br>
            <textarea  name="comment" id="kommentar" placeholder="Kommentar"></textarea><br>
            <input type="submit" name="submit" class="submit" value="Send din kommentar">
        </form>
    </div>
</article>   

