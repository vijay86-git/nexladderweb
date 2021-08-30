<?php


$content = file_get_contents("https://zeenews.india.com/rss/india-national-news.xml");
    $x = new SimpleXmlElement($content);


foreach($x->channel->item as $entry) {
        echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
    }
    
print_r($x->channel); die;	

$rss_feed = simplexml_load_file("https://www.aajtak.in/rssfeeds/?id=home");

print_r($rss); die;


if(!empty($rss_feed)) {
$i=0;

print_r($rss); die;

foreach ($rss_feed->channel->item as $feed_item) {
if($i>=10) break;
?>
<div><a class="feed_title" href="<?php echo $feed_item->link; ?>"><?php echo $feed_item->title; ?></a></div>
<div><?php echo implode(' ', array_slice(explode(' ', $feed_item->description), 0, 14)) . "..."; ?></div>
<?php		
$i++;	
}}
