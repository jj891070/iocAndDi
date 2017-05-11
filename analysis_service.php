<?php
require_once 'analysis_Interface.php';
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