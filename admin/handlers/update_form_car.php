<?php
ini_set('display_errors', 'On');
session_start();

require_once '../protect.php';
spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();

echo $id = $_GET['id'];

$sql = "SELECT `model`,`reg_date`,`doors`,`km`,`price`,`img`,`category_id`,`type`
            FROM `bil_bixen` 
            INNER JOIN bil_bixen_type
            ON bil_bixen.category_id = bil_bixen_type.type_id
            WHERE `car_id` = $id ";

$carData = $mysqli->query($sql);
$row = $carData->fetch_object();
$model = $row->model;
$email = $row->km;
$type = $row->type;

//$filename = $_FILES["myimage"]["name"];
//$microtime = microtime();
//$microtime_arr = explode(' ', $microtime);
//$filename = $microtime_arr[1] . '_' . $filename;
//$img_path = '../../assets/img/bil/' . $filename;
//$tmp_name = $_FILES["myimage"]['tmp_name'];


//    $carType = new Category($mysqli, 'bil_bixen_type');
//    $typeData = $carType->adminRole($mysqli);
//$user = new User($mysqli, 'bil_bixen_user');
?>
<!DOCTYPE html>
<html lang="da">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bil Bixen</title>
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Titillium+Web:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Maven+Pro|Quicksand" rel="stylesheet">
        <!--<link rel="stylesheet" href="../../assets/css/form.css" rel="stylesheet" type="text/css"/>-->
        <link href="../assets/core.css?<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body id="update_form">
        <div class="container  form_center">
            <div class="row main ">
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="car_handler.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="model" class="cols-sm-2 control-label">Model:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-user-secret fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="model" id="model"  placeholder="<?php echo $model; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reg_date" class="cols-sm-2 control-label">1. Indregistrering:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                                    <input type="date" class="form-control formcontrolcls" name="reg_date" id="reg_date"  placeholder="<?php echo $row->reg_date; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doors" class="cols-sm-2 control-label">Doors:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock " aria-hidden="true"></i></span>
                                    <input type="number" class="form-control formcontrolcls" name="doors" id="doors"  placeholder="<?php echo $row->doors; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="km" class="cols-sm-2 control-label">Km:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control formcontrolcls" name="km" id="km"  placeholder="<?php echo $row->km; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="cols-sm-2 control-label">Price:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control formcontrolcls" name="price" id="price"  placeholder="<?php echo $row->price; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="cols-sm-2 control-label">Image:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock" aria-hidden="true"></i></span>
                                    <input type="file"  class="form-control" name="myimage" id="img_input" title="">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group ">
                            <input type="submit" class="btn btn-info btn-lg btn-block login-button" value="Update user">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
