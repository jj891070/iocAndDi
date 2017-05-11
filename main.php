<?php 
require_once './Service/catch_Service.php';
require_once './Service/analysis_Service.php';
require_once 'honkongAnalysis.php';
require_once 'honkongGetRaw.php';

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
