<?php

class Role extends DatabaseTable {

    private $table_name = 'bil_bixen';
    private $role_id;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function getRole($mysqli, $username, $password) {
      $sql = "SELECT `user_id`, `role_id`, `role` FROM `bil_bixen_users` 
            INNER JOIN  bil_bixen_role ON  bil_bixen_users.role_id = bil_bixen_role.id
            WHERE `username` = '$username' AND `password` = '$password'";

        return $result = $mysqli->query($sql);
    }

}
