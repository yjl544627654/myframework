<?php
namespace core\lib;
use core\lib\conf;
//url 路由转换
class route
{
	public  $action;
	public  $ctrl;
	public  static $is_dirstr;
	
	function __construct()
	{
		//index.php/index/index 形式
		$path = $_SERVER['REQUEST_URI'];
		$pathname = dirname(__FILE__);

		if( !isset(self::$is_dirstr) ){
			//兼容没有设置虚拟域名也可以正常访问
			$arr = explode('\\',$pathname );
			$directory = $arr[count($arr)-3];
			$dirstr = '/'.$directory.'/';

			if( $path == $dirstr ){
			$path = '/';
			}else{ 
				$path = str_replace($dirstr, '', $path);
			}
			self::$is_dirstr = true;
		}
		
		

		if( isset($path) && $path!='/' ){

			$patharr = explode('/', $path);

			if(isset($patharr[2]) && !empty($patharr[2])){
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