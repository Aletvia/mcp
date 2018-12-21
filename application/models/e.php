<?php 
class E{
	public $i;
	public $e;
	
	public function __cosntruct($i,$e)
	{
		$this->$i = $i;
		$this->$e = $e;
	}
	public function get_i()
	{
		return $i;
	}
	public function get_e()
	{
		return $e;
	}
}
?>