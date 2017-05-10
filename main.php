<?php 
require_once 'bet_Service.php';
require_once 'honkongBet_v2_class.php';
require_once 'honkongBet_v1_class.php';		
$bet = new bet_Service( new honkongBetv2());
$event = $bet->getall();

// $bet = new honkongBetv1();
// $event = $bet->getEveryMarket();
$event=json_encode($event,JSON_UNESCAPED_UNICODE);
print_r($event);
// var_dump($event);
die();
?>
