<?php

//ini_set('display_errors', 1);
session_start();
require_once '../protect.php';

spl_autoload_register(function ($class) {
    require_once '../classes/' . $class . '.php';
});
$mysqli = UniversalConnect::doConnect();


    
?>
<h1>Bilbixen Filialer</h1>
            <form method="post" action="handlers/dealer_handler.php">
                <input type="hidden" value="add" name="action">
                <tr>
                    <td><input type="text"  class="form-control" name="name" placeholder="Afdelingens navn"></td>
                    <td><input type="text"  class="form-control" name="address" placeholder="Adresse"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
<!--                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>
                    <td><input type="text"  class="form-control" name="town" placeholder="town"</td>-->
                    
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
                    <td><input type="submit" name="submit" value="Opret afdeling" class="btn btn-success"></td>
                </tr>
            </form>
            <tr>
                <th>Id</th>
                <th>Afdelingens navn</th>
                <th>Adresse</th>
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