<?php
require_once '../Interface/analysis_Interface.php';
class analysis_Service {
	private $analysiss;
	function __construct(Analysis $analysis)
	{
		$this->analysis=$analysis;
	}
	
	public function allGameInformation($original)
	{
		return $this->analysis->allGameInformation($original);
	}
	

}
?>