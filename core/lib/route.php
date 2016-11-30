<?php
namespace core\lib;
use core\lib\conf;
//url 路由转换
class route
{
	public  $action;
	public  $ctrl;
	
	function __construct()
	{
		//index.php/index/index 形式
		$path = $_SERVER['REQUEST_URI'];

		if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/' ){
			$patharr = explode('/', $path);
			if(isset($patharr[2])){
				$this->ctrl = $patharr[2];
			}else{
				$this->ctrl = 'index';
			}
			if(isset($patharr[3])){
				$this->action = $patharr[3];
			}else{
				$this->action = conf::get('route','ACTION');
			}
			//url 多余部分
			for ($i=4; $i < count($patharr) ; $i=$i+2) { 
				if(isset($patharr[$i+1]) ){
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
			}

		}else{
			$this->ctrl = conf::get('route','CTRL');
			$this->action = conf::get('route','ACTION');
		}

	}
}