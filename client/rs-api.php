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
	
	/**
	 * 抛出新异常
	 * 
	 * @参数: $ecode 错误代码, $ename 错误名称, $emsg 错误消息.
	 **/
	static function new_error($ecode, $ename='', $emsg='')
	{		
		$e = new RSError($ecode, $ename, $emsg);
		rs::$errs->pushe($e);
	}

	/**
	 * 获取最后一次错误信息
	 * 
	 * @返回: 错误对象.
	 **/
	static function get_last_error()
	{		
		return rs::$errs->get_last_error();
	}
	
	/**
	* 连接服务器
	* 
	* @参数: $server_url 服务器地址, $password 操作密码.
	* @返回: 连接对象.
	**/
	static function connect($server_url = RS_SERVER, $password = RS_SERVER_ACTION_PWD)
	{
		return new RSLink($server_url, $password);
	}
	
	/**
	 * 断开连接
	 * 
	 * @参数: $link 连接对象.
	 **/
	 static function disconnect($link)
	 {
		 $link->disconnect();
	 }
}


?>
