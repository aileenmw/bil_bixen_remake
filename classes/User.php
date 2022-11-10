<?php

class User extends DatabaseTable {

    private $table_name = 'bil_bixen_users';
    private $id, $name, $email, $username, $password, $level;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

//    public function save() {
//        $to_be_inserted = [
//            'name' => $this->name,
//            'email' => $this->email,
//            'username' => $this->username,
//            'password' => $this->password,
//            'level' => $this->level
//            ];
//        return parent::save($to_be_inserted, $this->table_name);
//    }
//
//    public function delete() {
//        return parent::delete($this->table_name, $this->id, 'id');
//    }
//
//    public function update() {
//        $to_be_updated = [
//            'name' => $this->name,
//            'email' => $this->email,
//            'username' => $this->username,
//            'password' => $this->password,
//            'level' => $this->level
//            ];
//        $clause = ['id' => $this->id];
//        return parent::update($to_be_updated, $this->table_name, $clause);
//    }
//
//    public function getId() {
//        return $this->id;
//    }
//
//    public function getName() {
//        return $this->name;
//    }
//
//    public function getEmail() {
//        return $this->email;
//    }
//
//    public function getUsername() {
//        return $this->username;
//    }
//
//    protected function getPassword() {
//        return $this->password;
//    }
//    protected function getLevel() {
//        return $this->level;
//    }
//
//    public function setName($name) {
//        $this->name = $name;
//    }
//
//    public function setEmail($email) {
//        $this->email = $email;
//    }
//
//    public function setUsername($username) {
//        $this->username = $username;
//    }
//
//    protected function setPassword($password) {
//        $this->password = password_hash($password, PASSWORD_DEFAULT);
//    }
//    public function setLevel($level) {
//        $this->level = $level;
//    }
    function login($mysqli,$username, $password ) {
     
            $sql = "SELECT `username`,`password`,`level` FROM `bil_bixen_users` WHERE `username`= '$username' and `password` = '$password'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $level = $row['level'];

//            if (mysqli_num_rows($result) && $level == 1) {
//                $_SESSION['username'] = $username;
//                $_SESSION['level'] = $level;
//                header('Location: admin/admin_table.php');
//            } elseif (mysqli_num_rows($result) && $level == 2) {
//                $_SESSION['level'] = $level;
//                header('Location: index.php?page=forside');
//            } elseif (empty($username) || empty($password)) {
//                echo '<h3 style="color:red; margin:50px 0 0  420px ;">Vær venlig, at udfylde alle felter</h3>';
//            } else {
//                echo '<h3 style="color:red; margin:50px 0 0  420px ;">Du har ikke autorisation til at logge ind på denne side</h3>';
//            }
        }
    }

//}
