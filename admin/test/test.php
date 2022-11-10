<?php
ini_set('display_errors', 'On');
session_start();

require_once '../protect.php';
spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();

$adminRole = new Role($mysqli, 'bil_bixen_role');
$roleData = $adminRole->adminRole($mysqli);

if(isset($_GET['submit'])){
    echo $_GET['role'];
}
?>
<form method="get" action="">
<select name="role" class="custom-select date_inp">
    <?php
    while ($role_row = $roleData->fetch_object()) {
        echo $roleN = $role_row->role;
        echo '<br>';
        echo $role_id = $role_row->id;
        ?>
        <option value="<?php echo $role_id; ?>"><?php echo ucfirst($roleN); ?></option>
        <?php
    }
    ?>
</select>
    <input type="submit" name="submit">
</form>