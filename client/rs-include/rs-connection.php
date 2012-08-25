<?php
/**
 * *远程SQL* 连接管理
 * 
 * 当然是与服务器的连接..
 * 
 * Abreto<m@abreto.net>
 **/

global $__rs;

require_once('rs-common.php');

class RSLink
{
	var $id;
	var $token;
	var $cmd_url;
	var $pwd;
	var $connected;
	
	function __construct($cmd, $pwd, $connect = 1)
	{
		$this->id = RSLink::$count++;
		$this->pwd = $pwd;
		$this->cmd_url = $cmd;
		$this->connected = 0;
		
		if( $connect )
			$this->connect();
	}
	
	function __destruct()
	{
		$this->id = null;
		$this->token = null;
		$this->url = null;
		$this->pwd = null;
	}
	
	function connect()
	{
		$url = $cmd_url . '?action=connect&pwd=' . (urlencode($this->pwd));
		$response = file_get_contents($url);
		$r = explode('#', $response);
		
		if($r[0] == '0')
		{
			rs_new_error((int)($r[1]));
		}
		else
		{
			$this->token = $r[1];
			$this->connected = 1;
		}
	}
	
	/*
	function close_connection()
	{
		$url = $cmd_url . '?action=connect&pwd='.(urlencode($this->pwd)).'&token='.($this->token);
	}
	*/
	
	// ----
	static $count = 0;
}


?>
