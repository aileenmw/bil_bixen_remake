<?php
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

$mysqli = UniversalConnect::doConnect();
?>

<!--READ-->

<h2>Choose a user</h2>
<form method="get" action="">
    <select name="id">
        <?php
        $data = $mysqli->query("SELECT id FROM users");
        while ($row = $data->fetch_object()) {

            $id = $row->id;
            ?>
            <option value="<?php echo $id; ?>"><?php echo $id; ?></option>

            <?php
        }
        ?>
    </select>
    <input type="submit" name="read_submit">
</form>
<?php
if (isset($_GET['read_submit'])) {

    $userid = $_GET['id'];

    if ($userid) {

        $sql = " SELECT name, email, username FROM users WHERE id = $userid ";
        $result = $mysqli->query($sql);


        if ($result->num_rows > 0) {

            $row = $result->fetch_object();
            $name = $row->name;
            $email = $row->email;
            $username = $row->username;

            echo '<br /><br />Nice to see You, ' . $name . '!!<br /><br />';
            echo 'Your last username is ' . $username . '.<br /><br />';
            echo 'and Your email is ' . $email . '<br><br>';
        } else {
            echo 'Something went wrong!';
        }
    }
}


//SAVE
$createUser = new User($mysqli, 'users');

if (isset($_POST['save_submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $to_be_inserted = ['name' => $name,
        'email' => $email,
        'username' => $username,
        'password' => $password];

    $createUser->create($to_be_inserted, 'users');
}
?>

<form action="" method="post">
    <h2> Save </h2>
    <table>
        <tr>
            <td> <label> Name: </label> </td>
            <td> <input type="text" name="name"> </td>
        </tr>
        <tr>
            <td> <label> Email: </label> </td>
            <td> <input type="email" name="email"> </td>
        </tr>
        <tr>
            <td> <label> Username: </label> </td>
            <td> <input type="text" name="username"> </td>
        </tr>
        <tr>
            <td> <label> Password: </label> </td>
            <td> <input type="password" name="password"> </td>
        </tr>
        <tr>
            <td> <input type="submit" name="save_submit" value="Send"> </td>
        </tr>
    </table>
</form>

<!--DELETE-->
<?php
$deleteUser = new User($mysqli, 'users');

if (isset($_GET['delete_submit'])) {

    $delete_id = $_GET['delete_id'];


    if ($deleteUser->deleted('users', 'id', $delete_id)) {

        echo '<br>The user with the id ' . $delete_id . ' is deleted';
    } else {
        echo 'Something went wrong.';
    }
}
?>
<form action="" method="get">
    <h2> Delete ID </h2>
    <form method="get" action="">
        <select name="delete_id">
            <?php
            $data1 = $mysqli->query("SELECT id FROM users");
            while ($row1 = $data1->fetch_object()) {

                $delete_id = $row1->id;
                ?>
                <option value="<?php echo $delete_id; ?>"><?php echo $delete_id; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="delete_submit" value="delete">
    </form>
</form>

<!--UPDATe-->

<?php
$updateUser = new User($mysqli, 'users');

if (isset($_POST['update_submit'])) {

   $update_id = $_POST['update_id'];
//    $update_id = ['id' => $update_id];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $to_be_updated = [
        'name' => $name,
        'email' => $email,
        'username' => $username,
        'password' => $password];
    
    echo 'var_dump $to_be_updated: ';
    var_dump($to_be_updated);
    echo '<br>';
    $updateUser->updated($to_be_updated, 'users', $update_id);
}
?>
<!--<form>-->
<h2> Update </h2>
<!--    <table>
<tr>
   <td> <label>Choose User ID for update: </label> </td>
   <td> <input type="number" name="update_id"> </td>
</tr>
</table>
</form>-->
<form action="" method="post">    

    <table>
        <tr>
            <td> <label>Choose User ID for update: </label> </td>
            <td> <input type="number" name="update_id"> </td>
        </tr>
        <tr>
            <td> <label> Name: </label> </td>
            <td> <input type="text" name="name"> </td>
        </tr>
        <tr>
            <td> <label> Email: </label> </td>
            <td> <input type="email" name="email"> </td>
        </tr>
        <tr>
            <td> <label> Username: </label> </td>
            <td> <input type="text" name="username"> </td>
        </tr>
        <tr>
            <td> <label> Password: </label> </td>
            <td> <input type="password" name="password"> </td>
        </tr>
        <tr>
            <td> <input type="submit" name="update_submit" value="Update"> </td>
        </tr>
    </table>
</form>