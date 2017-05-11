<?php
require_once '../Interface/catch_Interface.php';
class catch_Service {

	private $catchRaw;
	function __construct(CatchRaw $catchRaw)
	{
		$this->catchRaw=$catchRaw;
	}
	
	public function getRaw($url)
	{
		return $this->catchRaw->getRaw($url);
	}
}
?>