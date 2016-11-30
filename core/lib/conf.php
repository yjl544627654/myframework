<?php
namespace core\lib;

/**
* 
*/
class conf 
{
	
	static public $confs = array();  //用于缓存
	static public function get($name,$key=null){

		/*
		   配置名，配置文件名

		1.判断文件是否存在
		2.判断配置是否存在
		3.缓存配置*/


		if(!isset(self::$confs[$name]) ){
			$file = CORE.'/config/'.$name.'.php';
			if( !is_file($file) ){
				throw new \Exception('没有找到配置文件'.$file);
				exit;
			}
			self::$confs[$name] = include $file;

		}

		$config = self::$confs[$name];

		 // 如果$key为null则返回配置文件的所有设置
		if(is_null($key)){
			return $config;
		}

		//返回单个配置
		if(isset($config[$key])){
			return $config[$key];
		}else{
			throw new \Exception('没有找到此配置项'.$key);
			exit;
		}
		
	}

	
}