<?php
require_once 'bet_Interface.php';
class honkongBetv2 implements Bet{

	private $original_code;
	function __construct()
	{
		$this->getraw();
	}

	public function getraw()
	{
		$ch=curl_init();
        $options = array(
                 CURLOPT_URL            => 'http://bet.hkjc.com/football/index.aspx?lang=ch',
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_USERAGENT      => "Google Bot",
        );
        curl_setopt_array($ch, $options);
        $original=curl_exec($ch);
        $original=gzdecode($original);//解壓縮
        curl_close($ch);
        $this->original_code=str_replace(array("\r","\t","\n"),'',$original);
	}

	public function getEveryGame()
	{
		$original=$this->original_code;
		preg_match_all('(id="rmid[0-9]+".*?<\/tr>)',$original,$everyGame);
		$everyGameLength=count($everyGame[0]);
		$event = [];
		for ($i=0; $i < $everyGameLength; $i++) { 
			preg_match_all('(id="rmi.*?")',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/id="rmid/','',$tmp[0]);
        	$eventId=preg_replace('/"/','',$tmp[0]);

        	preg_match_all('(對賽往績">.*?<\/a>)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/對賽往績">/','',$tmp[0]);
        	$tmp=preg_replace("/<label class='lblvs'>/",'',$tmp[0]);
        	$tmp=preg_replace('/<\/a>/','',$tmp);
        	$eventName=preg_replace('/<\/label>/','',$tmp);

        	preg_match_all('(class="cesst ttgR2">.*?<\/span>)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/class="cesst ttgR2">/','',$tmp[0]);
        	$tmp=preg_replace('/<span>/','',$tmp);
        	$BetTime=preg_replace('/<\/span>/','',$tmp[0]);

        	$event[] = [
        		'id' => $eventId,
        		'name' => $eventName,
        		'betTime' => $BetTime,
        		'version' => '2',
        	];
        }
        return $event;
	}

	public function getEveryMarket()
	{
		$original=$this->original_code;
		preg_match_all('(id="rmid[0-9]+".*?<\/tr>)',$original,$everyGame);
		$everyGameLength=count($everyGame[0]);
		$event = [];
		for ($i=0; $i < $everyGameLength; $i++) { 
            preg_match_all('(id="rmi.*?")',$everyGame[0][$i],$tmp);
            $tmp=preg_replace('/id="rmid/','',$tmp[0]);
            $eventId=preg_replace('/"/','',$tmp[0]);

			preg_match_all('(HAD_H">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_H">/','',$tmp[0]);
        	$eventHomeOdd=preg_replace('/</','',$tmp[0]);

        	preg_match_all('(HAD_D">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_D">/','',$tmp[0]);
        	$eventPeaceOdd=preg_replace('/</','',$tmp[0]);

        	preg_match_all('(HAD_A">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_A">/','',$tmp[0]);
        	$eventAwayOdd=preg_replace('/</','',$tmp[0]);

        	preg_match_all('(class="cesst ttgR2">.*?<\/span>)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/class="cesst ttgR2">/','',$tmp[0]);
        	$tmp=preg_replace('/<span>/','',$tmp);
        	$BetTime=preg_replace('/<\/span>/','',$tmp[0]);

        	$event[] = [
        		'id' => $eventId,
        		'home' => $eventHomeOdd,
        		'peace' => $eventPeaceOdd,
        		'away' => $eventAwayOdd,
        		'betTime' => $BetTime,
        		'version' => '2',
        	];
        }

        return $event;
	}

	public function getall()
	{
		$original=$this->original_code;
		preg_match_all('(id="rmid[0-9]+".*?<\/tr>)',$original,$everyGame);
		$everyGameLength=count($everyGame[0]);
		$event = [];
		for ($i=0; $i < $everyGameLength; $i++) { 

			preg_match_all('(id="rmi.*?")',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/id="rmid/','',$tmp[0]);
        	$eventId=preg_replace('/"/','',$tmp[0]);

        	preg_match_all('(對賽往績">.*?<\/a>)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/對賽往績">/','',$tmp[0]);
        	$tmp=preg_replace("/<label class='lblvs'>/",'',$tmp[0]);
        	$tmp=preg_replace('/<\/a>/','',$tmp);
        	$eventName=preg_replace('/<\/label>/','',$tmp);

        	preg_match_all('(HAD_H">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_H">/','',$tmp[0]);
        	$eventHomeOdd=preg_replace('/</','',$tmp);


        	preg_match_all('(HAD_D">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_D">/','',$tmp[0]);
        	$eventPeaceOdd=preg_replace('/</','',$tmp);

        	preg_match_all('(HAD_A">.*?<)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/HAD_A">/','',$tmp[0]);
        	$eventAwayOdd=preg_replace('/</','',$tmp);

        	preg_match_all('(class="cesst ttgR2">.*?<\/span>)',$everyGame[0][$i],$tmp);
        	$tmp=preg_replace('/class="cesst ttgR2">/','',$tmp[0]);
        	$tmp=preg_replace('/<span>/','',$tmp);
        	$BetTime=preg_replace('/<\/span>/','',$tmp[0]);

        	$event[] = [
        		'id' => $eventId,
        		'name' => $eventName,
        		'home' => $eventHomeOdd,
        		'peace' => $eventPeaceOdd,
        		'away' => $eventAwayOdd,
        		'betTime' => $BetTime,
        		'version' => '2',
        	];
        }
        return $event;
	}

}
?>