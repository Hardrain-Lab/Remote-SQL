<?php
/**
 * *远程SQL*客户端API接口定义
 * 
 * 要使用*远程SQL*所有功能,
 * 只需`require_once('rs-api.php');`即可.
 *
 * Abreto<m@abreto.net>
 **/

/** 载入配置文件 */
require_once( 'rs-include/rs-config.php' );

/** 载入 */
require_once( 'rs-include/rs-common.php' );

/** 载入连接模块 */
require_once( 'rs-include/rs-connection.php' );


class rs
{
	static $errs = new RSErrors();
	
	static function new_error($ecode, $ename='', $emsg='')
	{		
		$e = new RSError($ecode, $ename, $emsg);
		rs::$errs->pushe($e);
	}

	static function get_last_error()
	{		
		return rs::$errs->get_last_error();
	}
	
	/**
	* 连接服务器
	* 
	**/
	static function connect($server_url = RS_SERVER, $password = RS_SERVER_ACTION_PWD)
	{
		return new RSLink($server_url, $password);
	}
}


?>
