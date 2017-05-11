<?php
require_once 'catch_Interface.php';
class catch_Service {

	private $catch;
	function __construct(Catch $catch)
	{
		$this->catch=$catch;
	}
	
	public function getRaw($url)
	{
		return $this->catch->getRaw($url);
	}
}
?>