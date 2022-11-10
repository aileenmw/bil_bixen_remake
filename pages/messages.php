<?php

    // etabler forbindelse til databasen
    $mysqli = db_connect();

    // hent sql fra phpMyAdmin
    $sql = " SELECT `id`, `heading`, `subheading`, `description`, "
            . " DATE_FORMAT(created,'%d-%m-%Y  %H:%i') AS `created`, `author` "
            . " FROM `news` ";
    
    // kald function for at hente data fra databasen
    $result = read($sql, $mysqli);
    // print_r($result);
    // die();
    
    // declarer variabler
    $id = $heading = $subheading = $description = $created = $author = $output = '';
    
    // loop gennem result
    while ($obj = $result->fetch_object()) {
        $id = $obj->id;
        $heading = $obj->heading;
        $subheading = $obj->subheading;
        $description = $obj->description;
        if (strlen($description) > 150) {
          $description = substr($description,0,150) . '...<br>';
        }
        $created =  $obj->created;
        $author =  $obj->author;
        
        $output .= "<article>" . PHP_EOL;
        $output .= "<p class=\"author\">$author</p>" . PHP_EOL;
        $output .= "<em>$created</em>" . PHP_EOL;
        $output .= "<h2>$heading</h2>" . PHP_EOL;
        $output .= "<h3><a href=\"index.php?page=show_news&id=$id\">Læs mere</a></h3>" . PHP_EOL;
        $output .= "</article>" . PHP_EOL;
          
    }
      
?>
<!--24 februar, 2017-->
<section>
    <h1>Nyheder</h1>
<?php    echo $output; ?>
</section>  