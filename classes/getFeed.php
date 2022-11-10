<?php

class getFeeds {

    private $link;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }
    
        function readExternalFeed($link) {

        $feed = simplexml_load_file($link);

        $t = 0;
        $c = 10;

        foreach ($feed->channel->item as $item) {
            while ($t < $c) {
                echo '<b>' . $item->title . '</b>';
                echo '<br>';
                echo "<a href='{$item->link}'>{$item->link}</a><br>";
                echo $item->description . '<br><br>';
                break;
            }
            $t++;
        }
    } 
}
