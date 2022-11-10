<?php
ini_set('display_errors', 'On');
session_start();

require_once '../protect.php';
spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();
?>
<p style="color: #fff;">
    <?php
    $id = $_GET['id'];

    $user = new User($mysqli, 'bil_bixen_users');
    $userData = $user->user($mysqli, $id);
    $row = $userData->fetch_object();

    $username = $row->username;
    $email = $row->email;
//    $password = $row->password;
    $role = $row->role;

    $adminRole = new Role($mysqli, 'bil_bixen_role');
    $roleData = $adminRole->adminRole($mysqli);
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
                    <form class="form-horizontal" method="post" action="user_handler.php">
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Username:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-user-secret fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="username" id="username"  placeholder="<?php echo $username; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control formcontrolcls" name="email" id="email"  placeholder="<?php echo $email; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Admin rolle:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
                                    <select name="role" class="custom-select date_inp">
                                        <?php
                                        while ($role_row = $roleData->fetch_object()) {
                                            $roleN = $role_row->role;
                                            $role_id = $role_row->id;
                                            ?>
                                            <option value="<?php echo $role_id; ?>"><?php echo ucfirst($roleN); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password:</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon iconbk"><i class="fa fa-lock fa-lock " aria-hidden="true"></i></span>
                                    <input type="password" class="form-control formcontrolcls" name="password" id="password"  placeholder="Enter new password"/>
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
