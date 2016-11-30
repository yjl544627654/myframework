<?php
namespace core\lib;
use core\lib\conf;
/**
日志类

 1确定日志的存储方式
 2写入文件

*/
class log 
{
	
	static public $class;
	function __construct()
	{
		
	}

	static public function init(){
		//确定存储方式

		$drive = conf::get('log','DRIVE');

		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}

	static public function log($name,$file ='log'){
		self::$class->log($name,$file);
	}



}