<?php
/**
 * 数据结构 栈
 * 
 * Abreto<m@abreto.net>
 **/

class RSStack
{
	private $data;
	private $top;
	
	public function __construct()
	{
		$this->data = array();
		$this->top = -1;
	}
	
	public function __destruct()
	{
		$this->data = null;
		$this->top = null;
	}
	
	public function count()
	{
		return ($this->top + 1);
	}
	
	public function push($x)
	{
		$this->data[ ++$this->top ] = $x;
	}
	
	public function pop(&$r)
	{
		if( $this->top < 0 )
			return 0;
		$r = $this->data[ $this->top-- ];
		return 1;
	}
	
	public function clean()
	{
		$this->top = -1;
	}
	
}

?>
