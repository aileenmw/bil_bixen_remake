<?php
ini_set('display_errors', 'On');
session_start();

require_once '../protect.php';
spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();
?>
<!--<p style="color: #fff;">-->
<?php
$id = $_GET['id'];

$sql = "SELECT `name`,`address`,`postal_code`,`town`,`username`,`password`  FROM `bil_bixen_afdelinger` WHERE `id` =$id";
$userData = $mysqli->query($sql);
$row = $userData->fetch_object();

$name = $row->name;
$address = $row->address;
$postal_code = $row->postal_code;
$name = $row->name;
$town = $row->town;

//    $adminRole = new Role($mysqli, 'bil_bixen_role');
//    $roleData = $adminRole->adminRole($mysqli);
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
                    <form class="form-horizontal" method="post" action="dealer_handler.php">
                      
                        <div class="form-group">
                            <label for="address" class="cols-sm-2 control-label">Firmanavn:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="name" id="name"  placeholder="<?php echo $name; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="cols-sm-2 control-label">Adresse:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="address" id="email"  placeholder="<?php echo $address; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postal code" class="cols-sm-2 control-label">Postnummer:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock " aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="postal_code" id="password"  placeholder="<?php echo $postal_code; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="town" class="cols-sm-2 control-label">By:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock " aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="town" id="password"  placeholder="<?php echo $town; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Brugernavn skal være en email adresse</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-user-secret fa" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control formcontrolcls" name="username" id="username"  placeholder="<?php echo $row->username ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Enter Password:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control formcontrolcls" name="password" id="confirm" placeholder="Enter Password" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Re-enter Password:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control formcontrolcls" name="confirm" id="confirm"  placeholder="Confirm Password"/>
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
