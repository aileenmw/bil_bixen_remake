<?php
//ini_set('display_errors', 1);

class User extends DatabaseTable {

    private $table_name = 'users';
    private $id, $name, $email, $username, $password;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

    public function create($fields_and_values, $tablename) {
        $to_be_inserted = [
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password
            ];
        return parent::save($fields_and_values, $this->table_name);
    }

    public function deleted($table_name, $id_field, $id_value) {
        return parent::delete($this->table_name,'id' , $id_value );
    }

    public function updated($fields_and_values, $table_name, $clause) {
      
        echo'<br>print $fields_and_values on user.php : ';
        print_r($fields_and_values);
        echo '<br>';
        echo 'clause : '.$clause;
        echo '<br>';
        
        $clause = ['id' => $clause];
        
        return parent::update($fields_and_values, $this->table_name, $clause);
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