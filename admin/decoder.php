<?php
//require_once '../protect.php';
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();


$sql = "SELECT `message` FROM `bil_bixen_kommentarer`";
$data = $mysqli->query($sql);

if($_POST['submit']){
    
while($row = $data->fetch_object()){
    echo $message = $row->message;
    echo '<br>';
    $message = utf8_decode($message);
    $query = "UPDATE `bil_bixen_kommentarer` SET `message`= '$message'";
    $mysqli->query($query);
    
}
}


?>
<form action="" method="post">
    <input type="submit" name="submit">
</form>