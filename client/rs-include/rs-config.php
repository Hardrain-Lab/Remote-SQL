<?php
/**
 * *远程SQL* 基础配置文件
 * 
 **/

/** 远程SQL服务端地址(即server/cmd.php的URL). */
define('RS_SERVER', '在此键入服务端地址');

/** 远程SQL服务端连接密钥 */
define('SERVER_CONNECTION_KEY', '在此键入连接密钥');

/** 好了..接下来的东西请不要动..使用愉快. */
if( !defined('RSABSPATH') )
	define('RSABSPATH', dirname(__FILE__).'/');

global $__rs;
