<?php

require_once 'bet_Interface.php';
class bet_Service {
	private $bet;
	function __construct(Bet $bet)
	{
		$this->bet=$bet;
	}
	
	public function getEveryGame()
	{
		return $this->bet->getEveryGame();
	}
	public function getEveryMarket()
	{
		return $this->bet->getEveryMarket();
	}
	public function getall()
	{
		return $this->bet->getall();
	}

}
?>