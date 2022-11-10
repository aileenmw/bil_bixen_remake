<?php

//ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();

$sql = "SELECT `name` FROM `bil_bixen_afdelinger` ";
$data = $mysqli->query($sql);

echo $open = $_POST['open'] . ':00';
echo $close = $_POST['close'] . ':00';
echo $day = $_POST['day'];
$name = $_POST['name'];

if (isset($_POST['submit_time'])) {

    $sql_tjek = "SELECT `id`, `open`, `close` FROM `bil_bixen_openinghours` WHERE `open` = '$open' AND `close` = '$close'";
    $data_tjek = $mysqli->query($sql_tjek);
    $row_tjek = $data_tjek->fetch_object();

    if (empty($row_tjek)) {
        $sql_insert_hours = "INSERT INTO `bil_bixen_openinghours`( `open`, `close`) VALUES ('$open', '$close')";
        $mysqli->query($sql_insert_hours);
        $hour_id = $mysqli->insert_id;
        $sql_edit_hours = "UPDATE `bil_bixen_afdelinger` SET $day = $hour_id  WHERE `name` = '$name'";
        if ($mysqli->query($sql_edit_hours)) {
            header('location:../index.php?fejl=6');
        } else {
            header('location:../index.php?fejl=7');
        }
    } elseif (!empty($row_tjek)) {
        // echo 'fetch opening_hours id and update dealer'
        echo $hour_id = $row_tjek->id;
        echo $sql_edit_hours = "UPDATE `bil_bixen_afdelinger` SET $day = $hour_id  WHERE `name` = '$name'";
        if ($mysqli->query($sql_edit_hours)) {
          header('location:../index.php?fejl=6');
        } else {
          header('location:../index.php?fejl=7');
        }
    }
}
?>