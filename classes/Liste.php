<?php

ini_set("display_error", 1);

class Liste {

    private $id, $user_id, $car_id;
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    function addListe($user_id, $car_id, $page) {
        $sql_tjek = "SELECT COUNT(*) as c FROM `bil_bixen_huskeliste` WHERE `bil_id`= $car_id AND `user_id` = $user_id";
        $data_tjek = $this->mysqli->query($sql_tjek);
        $row = $data_tjek->fetch_object();
        $c = $row->c;

        $liste_message = '';
        if ($c > 0) {
            $liste_message = 'Køretøjet er allerede på din liste';
            header('location: ../index.php?page=' . $page . '&message=' . $liste_message);
        } else {
            $sql = "INSERT INTO `bil_bixen_huskeliste`(`bil_id`, `user_id`) VALUES ( $car_id, $user_id)";
            $this->mysqli->query($sql);
            header('location: ../index.php?page=' . $page);
        }
    }

    function removeListe($user_id) {
        $sql = "DELETE FROM `bil_bixen_huskeliste` WHERE `user_id` = $user_id";
        if ($this->mysqli->query($sql)) {
            $message_liste = 'Din huskeseddel er blevet slettet';
            // there was a variable $page instead of frontpage  
            header('location: ../index.php?message=' . $message_liste);

        }
    }

    function removeItem($car_id, $user_id) {
        $sql = "DELETE FROM `bil_bixen_huskeliste` WHERE `bil_id` = $car_id AND user_id = $user_id";
        if ($this->mysqli->query($sql)) {
            header('location:liste_handler.php?action=read&car_id=' . $car_id . '&user_id=' . $user_id);
        }
    }

    function getListe($user_id) {
        $sql = "SELECT `car_id`, `model`,`price` FROM `bil_bixen_huskeliste` 
                INNER JOIN bil_bixen 
                ON bil_bixen_huskeliste.bil_id = bil_bixen.car_id
                WHERE `user_id` = $user_id ";
        $result = $this->mysqli->query($sql);
        
//        
        
        echo '<h1 style="text-align: center;font-family: arial;">Din huskeliste</h1>';
        echo '<table border="1"cellpadding="15" style="border-collapse: collapse;margin: auto;background-color: #eed; margin-top:5%%"><thead>'
        . '<th>ID</th><th>Model</th><th>Pris</th><th>SLET</th></thead>';
        while ($row = $result->fetch_object()) {
            echo '<tr><td>';
            echo $car_id = $row->car_id;
            echo '</td><td>';
            echo '<a href="../index.php?page=details&id='.$car_id.'">'.$row->model;
            echo '</a></td>';
            echo '<td>';
            echo $row->price;
            echo '</td>';
            echo '<td style="text-align: center;">';
            echo '<a href="liste_handler.php?action=delete_item&car_id=' . $car_id . '&user_id=' . $user_id . '" >X</a>';
            echo '</td></tr>';
        }
        echo '<tr><td>';
        echo '<a href="../index.php"><b>TILBAGE</b></a> ';
        echo '</td><td>';
        echo '<a href="liste_handler.php?action=delete_liste&user_id=' . $user_id . '" style="color:red;">SLET LISTE</a>';
        echo '</td><td></td><td></td></tr>';
        echo '</table>';
    }

}
