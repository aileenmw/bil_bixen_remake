<?php

class Role extends DatabaseTable {

    private $table_name = 'bil_bixen';
    private $role_id, $role;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

function adminRole($mysqli){
    $sql = "SELECT `id`,`role`  FROM `bil_bixen_role`";     
    return $result = $mysqli->query($sql);
}
}



