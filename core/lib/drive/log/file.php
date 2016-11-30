<?php
namespace core\lib\drive\log;
use core\lib\conf;
/**
* 日志文件存储
*/
class file
{
	public $path;
	public function __construct(){
		$path = conf::get('log','POTION');
		$this->path = $path['PATH'];
	}


	public function log($message,$file = 'log'){
		/*
		1确定文件目录是否存在
		  新建目录
		2写入日志
		3分小时写入文件
			一小时一个文件
		*/

		if( !is_dir($this->path.date('YmdH')) ){
			//新建文件
			mkdir($this->path.date('YmdH'),0777,true);
		}
		$filename = $this->path.date('YmdH').'/'.$file.'.php' ; 

		//写入日志内容
		return file_put_contents($filename ,date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}

