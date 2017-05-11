<?php
if (!defined('DIR')) define("DIR",dirname(__FILE__));

require_once DIR.'/Service/catch_Service.php';
require_once DIR.'/Service/analysis_Service.php';
require_once DIR.'/honkongAnalysis.php';
require_once DIR.'/honkongGetRaw.php';

$url='http://bet.hkjc.com/football/index.aspx?lang=ch';		
$catch = new catch_Service( new honkongGetRaw());
$original = $catch->getRaw($url);
$analysis = new analysis_Service( new honkongAnalysis());
$event = $analysis->allGameInformation($original);

$event=json_encode($event,JSON_UNESCAPED_UNICODE);
print_r($event);
// var_dump($event);
die();
?>
