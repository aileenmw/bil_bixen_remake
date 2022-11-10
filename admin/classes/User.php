<?php
//ini_set('display_errors', 1);

class User extends DatabaseTable {

    private $table_name = 'bil_bixen_users';
    private $id, $username, $password;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function save($fields_and_values, $table_name) {
        return parent::save($fields_and_values, $this->table_name);
    }

    public function delete($table_name, $id_field, $id_value) {
        return parent::delete($this->table_name, $id_field, $id_value);
    }

    public function update($fields_and_values, $table_name, $clause) {
//        $to_be_updated = [
//            'username' => $this->username,
//            'password' => $this->password
//        ];
//        $clause = ['id' => $this->id];
        return parent::update($fields_and_values, $this->table_name, $clause);
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    protected function getPassword() {
        return $this->password;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    protected function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function users($mysqli) {
          $sql = "SELECT `user_id`, `username`,`email`, `role_id` , `role`
                FROM `bil_bixen_users`
                INNER JOIN bil_bixen_role
                ON bil_bixen_users.role_id=bil_bixen_role.id";
        return $result = $mysqli->query($sql);
    }
    function user($mysqli, $id) {
         $sql = "SELECT `user_id`, `username`,`email`, `role_id` , `role`
                FROM `bil_bixen_users`
                INNER JOIN bil_bixen_role
                ON bil_bixen_users.role_id=bil_bixen_role.id
                WHERE user_id = $id";
        return $result = $mysqli->query($sql);
    }
   
}


