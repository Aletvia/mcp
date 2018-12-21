<?php 
class u{
	public $i;
	public $e;
	public $t;
	public $s;
	public $n;
	public $p;
	
	public function __cosntruct($i,$e,$t,$s,$n,$p)
	{
		$this->$i = $i;
		$this->$e = $e;
		$this->$t = $t;
		$this->$s = $s;
		$this->$n = $n;
		$this->$p = $p;
	}
	public function get_i()
	{
		return $i;
	}
	public function get_e()
	{
		return $e;
	}
	public function get_t()
	{
		return $t;
	}
	public function get_s()
	{
		return $s;
	}
	public function get_n()
	{
		return $n;
	}
	public function get_p()
	{
		return $p;
	}
}
?>