<?php
//ini_set('display_errors', 1);
class Comment extends DatabaseTable {

    private $table_name = 'bil_bixen_kommentarer';
    private $id, $message, $name, $email, $time, $car_id, $status;

    public function __construct($mysqli, $table_name) {
        parent::__construct($mysqli);
        $this->table_name = $table_name;
    }

//    public function save() {
//        $to_be_inserted = [
//            'message' => $this->message,
//            'name' => $this->name,
//            'email' => $this->email,
//            'time' => $this->time,
//            'id' => $this->biler_id,
//            'status' => $this->status
//        ];
//        return parent::save($to_be_inserted, $this->table_name);
//    }
//
    public function delete($table_name, $id_field, $id_value) {
        return parent::delete($this->table_name,  $id_field, $this->id );
    }
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
//    public function getTime() {
//        return $this->time;
//    }
//
//    protected function getCarId() {
//        return $this->car_id;
//    }
//
//    protected function getStatus() {
//        return $this->status;
//    }
//
//    public function setMessage($message) {
//        $this->message = $message;
//    }
//
//    public function setName($name) {
//        $this->name = $name;
//    }
//
//    public function setStatus($staus) {
//        $this->status = $status;
//    }
//    
    
    

    function messageCount($mysqli, $car_id) {

        $sql = "SELECT  Count(`message`) FROM `bil_bixen_kommentarer`
                    INNER JOIN bil_bixen ON bil_bixen_kommentarer.`biler_id` = bil_bixen.car_id
                    WHERE biler_id = $car_id";
        $result = $mysqli->query($sql);

      $row = $result->fetch_assoc();
                $count = $row['Count(`message`)'];
        return $count;
    }
    
    
    
    function createMessage($mysqli, $comment, $name, $email, $car_id) {
    $comment = $mysqli->real_escape_string($comment);
    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);

    $sql = "INSERT INTO `bil_bixen_kommentarer`( `message`, `name`, `email`, `biler_id`,`status`) 
            VALUES ( '$comment', '$name', '$email', $car_id, 1)";

    if (empty($comment) or empty($name) or empty($email)) {
        alert('Vær venlig at udfylde alle felter!');
    } else {
        $result = $mysqli->query($sql);

        if ($result) {
            alert( 'Dine data er :' . '<br><br>Kommentar: ' . $comment . '<br>Navn :' . $name . '<br>'
            . 'Email: ' . $email . '<br>');
        }
    }
}
    
    
    
}
    
