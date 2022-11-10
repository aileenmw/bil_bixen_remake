<?php

class User extends DatabaseTable {

    private $table_name = 'users';
    private $id, $name, $email, $username, $password;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function save() {
        $to_be_inserted = [
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password
            ];
        return parent::save($to_be_inserted, $this->table_name);
    }

    public function delete() {
        return parent::delete($this->table_name, $this->id, 'id');
    }

    public function update() {
        $to_be_updated = [
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password
            ];
        $clause = ['id' => $this->id];
        return parent::update($to_be_updated, $this->table_name, $clause);
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    protected function getPassword() {
        return $this->password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    protected function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

}