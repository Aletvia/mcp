<?php 
class M{
	public $i;
	public $ie;
	public $m;
	
	public function __cosntruct($i,$ie,$m)
	{
		$this->$i = $i;
		$this->$ie = $ie;
		$this->$m = $m;
	}
	public function get_i()
	{
		return $i;
	}
	public function get_ie()
	{
		return $ie;
	}
	public function get_m()
	{
		return $m;
	}

?>