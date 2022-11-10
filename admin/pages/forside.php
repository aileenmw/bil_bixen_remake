<?php

include 'includes/header.php';

$role = $_SESSION['role'];
$username = $_SESSION['username'];
$message = '';
$messageCom = '';
$fejl = $_GET['fejl'] ?? null;
$id = $_GET['id'] ?? null;

if ($fejl) {
    switch ($fejl) {

        case '1':
            $message = 'Input er ufuldstændigt';
            break;
        case '2':
            $message = 'Brugeren existere ikke';
            break;
        case '3':
            $name = $_GET['name'];
            $userid = $_GET['userid'];
            $message = 'Skal <b>"' . $name . '"</b> slettes som bruger?
                      <a class="btn btn-small btn-success" href="handlers/user_handler.php?id=' . $userid . '&confirm=1&action=delete">Ja, slet</a>
                      <a class="btn btn-small btn-danger" href="handlers/user_handler.php?id=' . $userid . '&confirm=2&action=delete">Fortryd</a>';
            break;
        case '4':
            $message = 'Posten er blevet slettet';
            break;
        case '5':
            $message = 'Posten er blevet oprettet';
            break;
        case '6':
            $message = 'Data er blevet redigeret';
            break;
        case '7':
            $message = 'Der er sket en fejl';
            break;
        case '11':
            $message = 'Kommentaren er godkendt';
//            header('Location:index.php#comments');
            break;
        case '12':
            $message = 'Skal kommentaren virkelig slettes ?
                      <a class="btn btn-small btn-success" href="handlers/comment_handler.php?action=delete&id=' . $id . '&confirm=1">Ja, slet</a>
                      <a class="btn btn-small btn-danger" href="handlers/comment_handler.php?action=delete&confirm=2">Fortryd</a>';
            break;
        case '13':
            $message = 'Der er sket en fejl';
            break;
        case '14':
            $message = 'Kommentaren er slettet';
            break;
        case '15':
            $id = $_GET['id'];
            $message = 'Skal bilen virkelig slettes ?
                      <a class="btn btn-small btn-success" href="handlers/car_handler.php?action=delete&id=' . $id . '&confirm=1">Ja, slet</a>
                      <a class="btn btn-small btn-danger" href="handlers/car_handler.php?action=delete&confirm=2">Fortryd</a>';
            break;
        case '16':
            $name = $_GET['name'];
            $id = $_GET['id'];
            $message = 'Skal <b>"' . $name . '"</b> slettes som bruger?
                      <a class="btn btn-small btn-success" href="handlers/dealer_handler.php?action=delete&confirm=1&id=' . $id . '">Ja, slet</a>
                      <a class="btn btn-small btn-danger"  href="handlers/dealer_handler.php?id=' . $id . '&confirm=2&action=delete">Fortryd</a>';
            break;
    }
}

//echo '<a class="btn btn-small btn-success" href="handlers/dealer_handler.php?action=delete&confirm=1&id=1">' ;
?>

<div id="til_top"></div>
<?php



echo '<h2><span class="cap">' . $username . '</span>, du har status som ' . $role . '</h2>';

$user = new User($mysqli, 'bil_bixen_users');
$users = $user->users($mysqli);

$adminRole = new Role($mysqli, 'bil_bixen_role');
$roleName = $adminRole->adminRole($mysqli);
?>
<div class="wrapper">
    <div clas="container-fluid">      
        <div class="btn_box">
            <a class="btn btn-danger logout" href="includes/logout.php">Logout</a><br>
            <a class="btn btn_link" href="#users">Admin</a><br>
            <a class="btn btn_link" href="#dealer">Forhandlere</a><br>
            <a class="btn btn_link" href="#time">Åbningstider</a><br>
            <?php
            $cat = new Category($mysqli, 'bil_bixen_type');
            $catLink = $cat->getAllCarTypes($mysqli);
            while ($cat_link = $catLink->fetch_object()) {
                $link = $cat_link->type;
                ?>
                <a class="btn btn_link" href="#<?php echo $link; ?>"><?php echo $link; ?></a><br>
                <?php
            }
            ?>           
            <a class="btn btn_link" href="#comments">Kommentarer</a><br>
            <a href="#til_top" class="btn btn-primary top_btn">Til toppen</a>
        </div>  
        <h3><?php echo $message; ?></h3>
        <div id="users"></div>
        <table class="table table-striped table-inverse">
            <h1>Admin</h1>
            <form method="post" action="handlers/user_handler.php">
                <input type="hidden" value="add" name="action">
                <tr>
                    <td><input type="text"  class="form-control" name="username" placeholder="username"></td>
                    <td><input type="email"  class="form-control" name="email" placeholder="email"</td>
                    <td><input type="text"  class="form-control" name="password" placeholder="password"</td>
                    <td>
                        <select name="role" class="custom-select date_inp">
                            <?php
                            while ($role_row = $roleName->fetch_object()) {
                                $role = $role_row->role;
                                $role_id = $role_row->id;
                                ?>
                                <option value="<?php echo $role_id; ?>"><?php echo ucfirst($role); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    <td><input type="submit" name="submit" value="Opret Bruger" class="btn btn-success"></td>
                </tr>
            </form>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php
            while ($user_row = $users->fetch_object()) {
                $username = $user_row->username;

                $username = trim(preg_replace('/\s+/', ' ', $username));
                ?>
                <tr>
                    <td><?php echo $user_row->user_id; ?></td>
                    <td><?php echo $user_row->username; ?></td>
                    <td><?php echo $user_row->email; ?></td>
                    <td><a class="btn btn-small btn-primary" href="handlers/update_form.php?id=<?php echo $user_row->user_id; ?>">Opdater</a></td>
                    <td><a class="btn btn-small btn-danger" href="handlers/user_handler.php?id=<?php echo $user_row->user_id; ?>&username=<?php echo $username; ?>&action=delete">Slet</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div id="dealer"></div>
        <table class="table table-striped table-inverse">
            <h1>Dealerships</h1>
            <?php
//            $dealer = new User($mysqli, 'bil_bixen_afdelinger');
//            $dealers = $user->users($mysqli);
            ?>
            <form method="post" action="handlers/dealer_handler.php">
                <input type="hidden" value="add" name="action">
                <tr>
                    <td><input type="text"  class="form-control" name="name" placeholder="name"></td>
                    <td><input type="text"  class="form-control" name="address" placeholder="address"</td>
                    <td><input type="text"  class="form-control" name="postal_code" placeholder="postal_code"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td>
                       <!-- <select name="role" class="custom-select date_inp">
                        <?php
//                            while ($role_row = $roleName->fetch_object()) {
//                                $role = $role_row->role;
//                                $role_id = $role_row->id;
//                                
                        ?>
                                <option value="//<?php // echo $role_id; ?>"><?php // echo ucfirst($role); ?></option>
                                //<?php
//                            }
                        ?>
                        </select>-->
                    <td><input type="submit" name="submit" value="Opret Forhandler" class="btn btn-success"></td>
                </tr>
            </form>
            <tr>
                <th>Id</th>
                <th>Navn</th>
                <th>Postnummer</th>
                <th>Adresse</th>
            </tr>
            <?php
            $sql_dealer = "SELECT `id`, `name`, `address`, `postal_code`, `town`  FROM `bil_bixen_afdelinger`";
            $dealer = $mysqli->query($sql_dealer);
            while ($dealer_row = $dealer->fetch_object()) {
                
                $dealer_name = $dealer_row->name;

                $dealer_name = trim(preg_replace('/\s+/', ' ', $dealer_name));
                ?>
                <tr>
                    <td><?php echo $dealer_row->id; ?></td>
                    <td><?php echo $dealer_row->name; ?></td>
                    <td><?php echo $dealer_row->postal_code; ?></td>
                    <td><?php echo $dealer_row->town; ?></td>
                    <td><a class="btn btn-small btn-primary" href="handlers/update_dealer.php?id=<?php echo $dealer_row->id; ?>">Opdater</a></td>
                    <td><a class="btn btn-small btn-danger" href="handlers/dealer_handler.php?id=<?php echo $dealer_row->id; ?>&name=<?php echo $dealer_name; ?>&action=delete">Slet</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        
        <!--// OPening and closing times-->
        <div id="time"></div>
        <!--<a href="index.php?page=test">LINK</a>-->
        <div style="height: 80px;"></div>
        <h2>Opdatér Åbningstider</h2>
        <?php
        $sql = "SELECT `name` FROM `bil_bixen_afdelinger` ";
        $data = $mysqli->query($sql);
        ?>

        <table class="table table-striped table-inverse">
            <form method="post" action="handlers/time_handler.php" id="time_form"> 
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
        <?php
        $cat = new Category($mysqli, 'bil_bixen_type');
        $cats = $cat->getAllCarTypes($mysqli);

        while ($cat_row = $cats->fetch_object()) {
            $cat_id = $cat_row->type_id;
            ?>
            <h1 id="<?php echo $cat_row->type; ?>"><?php echo $cat_row->type; ?></h1>          
            <table class="table table-striped table-inverse">
                <form method="post" action="handlers/car_handler.php" enctype="multipart/form-data">
                    <tr>
                        <td><input type="text"  class="form-control" name="model" placeholder="model"></td>
                        <td class="reg_date">1.indregistrering:</td>
                        <td><input type="date" class="form-control date_inp"  name="reg_date"></td>
                        <td><input type="number"  class="form-control" name="doors" placeholder="doors"></td>
                        <td><input type="number"  class="form-control" name="km" placeholder="km"></td>
                        <td><input type="file"  class="form-control" name="myimage" id="img_input" title=""></td>
                        <td><input type="number"  class="form-control" name="price" placeholder="price"></td>
                    <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                    <input type="hidden" name="action" value="add">
                    <td><button type="submit" class="btn btn-success" name="submit">Opret Annonce</button></td>
                    </tr>
                </form>
                <tr>
                    <th>Id</th>
                    <th>model</th>
                    <th>reg_date</th>
                    <th>doors</th>
                    <th>km</th>
                    <th>price</th>
                </tr>
                <?php
                $car = new Car($mysqli, 'bil_bixen');
                $cars = $car->read_car($mysqli, $cat_id);

                while ($car_row = $cars->fetch_object()) {
                    ?>
                    <tr>
                        <td><?php echo $car_row->car_id; ?></td>
                        <td><?php echo $car_row->model; ?></td>
                        <td><?php echo $car_row->reg_date; ?></td>
                        <td><?php echo $car_row->doors; ?></td>
                        <td><?php echo $car_row->km; ?></td>
                        <td><?php echo $car_row->price; ?></td>
                        <td><a class="btn btn-small btn-primary" href="handlers/update_form_car.php?id=<?php echo $car_row->car_id; ?>">Opdater</a></td>
                        <td><a class="btn btn-small btn-danger" href="handlers/car_handler.php?id=<?php echo $car_row->car_id; ?>&action=delete">Slet</a></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <?php
        }
        
//        MESSAGE TABLE

        $sql = "SELECT `id`, `biler_id`, `message`, `name`, `email`, `time` FROM `bil_bixen_kommentarer` WHERE `status` = 1 ORDER BY `time` DESC";
        $message_data = $mysqli->query($sql);
        ?>

        <div id="comments"></div>
        <h1>Kommentarer</h1>
        <h3><?php echo $messageCom; ?></h3>
        <table class="table table-striped table-inverse">
            <tr>
                <th>Bil Id</th><th>Kommentar</th><th>Navn</th><th>Email</th><th>Oprettet</th>
            </tr>
            <?php
            while ($message_row = $message_data->fetch_object()) {
                $comment_id = $message_row->id;
                ?>
                <tr>
                    <td><?php echo $message_row->biler_id; ?></td>
                    <td><?php echo $message_row->message; ?></td>
                    <td><?php echo $message_row->name; ?></td>
                    <td><?php echo $message_row->email; ?></td>
                    <td><?php echo $message_row->time; ?></td>
                    <td><a class="btn btn-small btn-primary" href="handlers/comment_handler.php?id=<?php echo $comment_id; ?>&action=edit">OK</a></td>
                    <td><a class="btn btn-small btn-danger" href="handlers/comment_handler.php?id=<?php echo $comment_id; ?>&action=delete">SLET</a></td>
                </tr>

                <?php
            }
            ?>
        </table>
    </div> <!-- container-fluid -->
</div>
</body>
</html>
