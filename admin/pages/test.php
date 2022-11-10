<?php
ini_set('display_errors', 1);

$sql = "SELECT `name` FROM `bil_bixen_afdelinger` ";
$data = $mysqli->query($sql); 


if($_GET['message']){
$message = $_GET['message']; 
}else{
    $message = 'Opdater Åbningstider';
}
?>
<h1><?php echo $message; ?></h1>

<table class="table table-striped table-inverse">
    <form method="post" action="handlers/time_handler.php" id="time_form"> 
       <!--<form method="post" action="" id="time_form">--> 
        <tr><td style="text-align: right;">
                <select class="selectpicker" name="name">
                    <?php
                    while ($row = $data->fetch_object()) {
                        echo '<option>' . $row->name . '</option>';
                    }
                    
                    ?>
                </select>
            </td>
            <td style="text-align: right;">
                <select name="day" class="selectpicker">
                    <option value="Mandag">Mandag</option>
                    <option value="Tirsdag">Tirsdag</option>
                    <option value="Onsdag">Onsdag</option>
                    <option value="Torsdag">Torsdag</option>
                    <option value="Fredag">Fredag</option>
                    <option value="Lørdag">Lørdag</option>
                    <option value="Søndag">Søndag</option>
                </select>
            </td>
            <td class="label"><label>Åbningstid :</label></td>
            <td>
                <select name="open" class="selectpicker">
                    <?php
                    $sql_hour = "SELECT `open` FROM `bil_bixen_open`";
                    $data_hour = $mysqli->query($sql_hour);
                    while ($hour_row = $data_hour->fetch_object()) {
                        echo '<option>' . SUBSTR($hour_row->open, 0, 5) . '</option>';
                    }
                    ?>     
                </select>
            </td>
            <td class="label"><label class="label">Lukningstid :</label></td>
            <td>
                <select name="close" class="selectpicker">
                    <?php
                    echo $sql_hour = "SELECT `close` FROM `bil_bixen_close`";
                    $data_hour = $mysqli->query($sql_hour);
                    while ($hour_row = $data_hour->fetch_object()) {
                        echo '<option>' . SUBSTR($hour_row->close, 0, 5) . '</option>';
                    }
                    ?>     
                </select>
            </td>
            <td style="text-align: left;"><input type="submit" name="submit_time"  class="btn btn-success"></td>
        </tr>
    </form>
</table>



<?php //SELECT DATE_FORMAT(time, '%H:%i') FROM bil_bixen_hours

//$open = $_POST['open'] . ':00';
//$close = $_POST['close'] . ':00';
//$day = $_POST['day'];
//$name = $_POST['name'];
//if (isset($_POST['submit_time'])) {
//
//    $sql_tjek = "SELECT `id`, `open`, `close` FROM `bil_bixen_openinghours` WHERE `open` = '$open' AND `close` = '$close'";
//    $data_tjek = $mysqli->query($sql_tjek);
//    $row_tjek = $data_tjek->fetch_object();
//
//    if (empty($row_tjek)) {
//        $sql_insert_hours = "INSERT INTO `bil_bixen_openinghours`( `open`, `close`) VALUES ('$open', '$close')";
//        $mysqli->query($sql_insert_hours);
//        $hour_id = $mysqli->insert_id;
//        $sql_edit_hours = "UPDATE `bil_bixen_afdelinger` SET $day = $hour_id  WHERE `name` = '$name'";
//        if($mysqli->query($sql_edit_hours)){
//            echo 'Åbningstiden er opdateret';
//        } else {
//            echo 'Noget gik galt';
//        }
//    } elseif(!empty($row_tjek)) {
//        // echo 'fetch opening_hours id and update dealer'
//        echo $hour_id = $row_tjek->id;
//        echo $sql_edit_hours = "UPDATE `bil_bixen_afdelinger` SET $day = $hour_id  WHERE `name` = '$name'";
//        if ($mysqli->query($sql_edit_hours)) {
//            echo 'Åbningstiden er opdateret';
//        } else {
//            echo 'Noget gik galt';        }
//    }
//}


//$sql = "SELECT open, close
//FROM `bil_bixen_afdelinger` 
//INNER JOIN bil_bixen_openinghours
//ON bil_bixen_afdelinger.'.$day.' = bil_bixen_openinghours.id
//WHERE `name`= '.$name";
// INNER JOIN UGEDAG PÅ OPENinghours
//SELECT bil_bixen_weekdays.id, `day`, `open_id`, `close_id` , open, close FROM `bil_bixen_weekdays` 
//INNER JOIN bil_bixen_openinghours
//ON bil_bixen_weekdays.`hours_id` = bil_bixen_openinghours.id
//
// WHERE bil_bixen_weekdays.id = 1
// INNER JOIN UGEDAG PÅ OPEN OG CLOSE
// 
//SELECT bil_bixen_weekdays.id, `day`, `open_id`, `close_id` , open, close FROM `bil_bixen_weekdays` 
//INNER JOIN bil_bixen_open
//ON bil_bixen_weekdays.open_id = bil_bixen_open.id
//
//INNER JOIN bil_bixen_close
//ON bil_bixen_weekdays.close_id = bil_bixen_close.id
// 
// WHERE bil_bixen_weekdays.id = 2