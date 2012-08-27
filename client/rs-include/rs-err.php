<?php
/**
 * *远程SQL*错误管理子系统.
 * 
 * Abreto<m@abreto.net>
 **/

require_once( 'class/stack.class.php' );


class RSError
{
	private $code;
	private $name;
	private $message;
	
	public function __construct($code, $name='', $message='')
	{
		$this->code = $code;
		$this->name = ($name=='')?(RSError::get_info_by_code($code, 'name')):($name);
		$this->message = ($message=='')?(RSError::get_info_by_code($code, 'msg')):($message);
	}
	
	public function __destruct()
	{
		$this->code = null;
		$this->name = null;
		$this->message = null;
	}
	
	public function format()
	{
		return ( ($this->name).'#'.($this->code).': '.($this->message) );
	}
	
	public function __get($f)
	{
		return $this->$f;
	}
	
	////////////////////////////////////////////////////
	const CONNECTION_PASSWD_ERROR = 0x020000;
	static function get_info_by_code($code, $nani)
	{
		$map = array(CONNECTION_PASSWD_ERROR=>array('name'=>'连接密码错误', 'msg'=>'连接密码错误'));
		return $map[$code][$nani];
	}
}

class RSErrors
{
	private $errs;
	
	public function __construct()
	{
		$this->errs = new RSStack();
	}
	
	public function __destruct()
	{
		$this->errs = null;
	}
	
	public function get_last_error()
	{
		if( !($this->errs->pop($e)) )
			return null;
		return $e;
	}
	
	public function pushe($e)
	{
		$this->errs->push($e);
	}
}



?>
