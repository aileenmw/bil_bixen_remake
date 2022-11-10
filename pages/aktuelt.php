
        <?php

        spl_autoload_register(function ($class) {
            require_once 'classes/' . $class . '.php';
        });

        $mysqli = UniversalConnect::doConnect();
        
        $feed = new Feed($mysqli);
        
        $title = 'National Geographic';
        $link = 'https://news.nationalgeographic.com';
        $description = 'Articles about animals and nature from around the world';
        
        $feed->createChannel($title, $link, $description);
        
        $sql = "SELECT `artikel_titel`,`artikel_url`,`description` FROM `artikler`";
        $data = $mysqli->query($sql);
        
        while($row = $data->fetch_object()){
            
          $item = $row->artikel_titel ?? "";
          $link = $row->artikel_url ?? "";
          $item_description = $row->description ?? "";
            
        $feed->addItem($item, $link, $item_description);
        }
   
$feed = simplexml_load_file('http://localhost/bil_bixen_remake/feed.xml');

$t = 0;
$c = 3;

foreach($feed->channel->item as $item){
    while($t < $c){
        echo $item->title;
        echo "<a href='{$item->link}'>{$item->titel}</a><br>";
        echo $item->description.'<br><br>';
        break;
    }
    $t++;
}
        ?>

