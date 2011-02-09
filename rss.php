<?php 
/**
 * Main dispatch page
 */
require_once dirname(__FILE__) . '/app/lib/base.php';

$http = new Horde_Http_Client();
$results = $http->get('http://h4.theupstairsroom.com/horde/jonah/delivery/rss.php?channel_id=124');
echo $results->getBody();
 ?>
