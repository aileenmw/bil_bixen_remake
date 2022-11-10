<?php
include 'includes/header.php';


//$_SESSION['logget'] = true;
//$_SESSION['role'] = $user->role;
//$_SESSION['username'] = $user->username;

$role = $_GET['role'];
$username = $_SESSION['username'];

echo '<h2><span class="cap">' . $username . '</span> ,du har status som ' . $role . '</h2>';

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();
$user = new User($mysqli, 'bil_bixen_users');
$users = $user->users($mysqli, $sql);
?>
<div class="wrapper">
    <div clas="container-fluid">

        <table class="table table-striped table-inverse" class="my_table">
            <h1>Users</h1>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php
            while ($user_row = $users->fetch_object()) {
                ?>
                <tr>
                    <td><?php echo $user_row->user_id; ?></td>
                    <td><?php echo $user_row->username; ?></td>
                    <td><?php // echo $user_row->password; ?></td>
                    <td><button class="btn btn-small btn-primary">Opdater</button></td>
                    <td><a class="btn btn-small btn-danger" href="admin_handler.php?id=<?php echo $user_row->user_id; ?>&action=delete">Slet</a></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td><input type="text"  class="form-control" name="username" placeholder="username"></td>
                <td><input type="text"  class="form-control" name="Password" placeholder="password"</td>
                <td></td>
                <td><button type="button" class="btn btn-success">Opret bruger</button></td>
            </tr>
        </table>

        <?php
        $cat = new Category($mysqli, $table_name);
        $cats = $cat->getAllCarTypes($mysqli, $sql);
        while ($cat_row = $cats->fetch_object()) {

            $cat_id = $cat_row->type_id;
            ?>
            <h1><?php echo $cat_row->type; ?></h1>
            <table class="table table-striped table-inverse">
                <tr>
                    <th>Id</th>
                    <th>model</th>
                    <th>reg_date</th>
                    <th>doors</th>
                    <th>km</th>
                    <th>price</th>
                    <th>category_id</th>
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
                        <td><?php echo $car_row->category_id; ?></td>
                        <td><button class="btn btn-small btn-primary">Edit</button></td>
                        <td><button class="btn btn-small btn-danger">delete</a></td>
                    </tr>

                    <?php
                }
                ?>
                <tr>
                    <td><input type="text"  class="form-control" name="model" placeholder="model"></td>
                    <td><input type="date" class="form-control date_inp"  name="reg_date" placeholder="Indregistreting"></td>
                    <td><input type="number"  class="form-control" name="doors" placeholder="doors"></td>
                    <td><input type="number"  class="form-control" name="km" placeholder="km"></td>
                    <td><input type="number"  class="form-control" name="price" placeholder="price"></td>
                    <td><button type="button" class="btn btn-success">Opret Annonce</button></td>
                </tr>
            </table>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>
