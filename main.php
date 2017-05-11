<?php
//載入檔案
if (!defined('DIR')) define("DIR",dirname(__FILE__));
require_once DIR.'/Service/catch_Service.php';
require_once DIR.'/Service/analysis_Service.php';
require_once DIR.'/honkongAnalysis.php';
require_once DIR.'/honkongGetRaw.php';

//設定要抓的url
$url='http://bet.hkjc.com/football/index.aspx?lang=ch';	

//抓取網頁原始碼，儲存在$original
$catch = new catch_Service( new honkongGetRaw());
$original = $catch->getRaw($url);

//分析原始碼，取出賽事資料，儲存在$event
$analysis = new analysis_Service( new honkongAnalysis());
$event = $analysis->allGameInformation($original);

$event=json_encode($event,JSON_UNESCAPED_UNICODE);
print_r($event);
die();
?>
