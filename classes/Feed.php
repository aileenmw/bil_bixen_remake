<?php


class Feed{

    private $title, $link, $description;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }
    
    function createChannel($title, $link, $description) {
        $xml = new SimpleXMLElement('<rss version="2.0" encoding="utf-8"></rss>');
        // statiske channel data
        $xml->addChild('channel');
        $xml->channel->addChild('title', $title);
        $xml->channel->addChild('link', $link);
        $xml->channel->addChild('desciption', $description);

        if ($xml->asXML('feed.xml')) {
//	header('Location:feed.xml','_blank');
        }
}

 function addItem($title,$link,$description) {
    
    $dom = new DOMDocument;
    $dom->load('feed.xml');

$xpath = new DOMXPath($dom);
$channelNode = $xpath->query('/rss/channel')->item(0);
if ($channelNode instanceof DOMNode) {
    
    $item = $channelNode->appendChild($dom->createElement('item'));

    $item->appendChild(
        $dom->createElement('titel',$title)
    );

    $item->appendChild(
        $dom->createElement('link', $link)
    );

    $item->appendChild(
        $dom->createElement('description', $description)
    );
}

$dom->save('feed.xml');
//header('Location:feed.xml');
}  



}
