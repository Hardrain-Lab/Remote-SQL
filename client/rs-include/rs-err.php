<?php
/**
 * *远程SQL*错误管理子系统.
 * 
 * Abreto<m@abreto.net>
 **/

require_once( 'class/stack.class.php' );

global $__rs;

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
	static function get_info_by_code($code, $nani)
	{
		$map = array();
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
	
	public function newe($e)
	{
		$this->errs->push($e);
	}
}

$__rs['errs'] = new RSErrors();

function rs_new_error($ecode, $ename='', $emsg='')
{
	global $__rs;
	
	$e = new RSError($ecode, $ename, $emsg);
	$__rs['errs']->newe($e);
}

function rs_get_last_error()
{
	global $__rs;
	
	return $__rs['errs']->get_last_error();
}

?>
