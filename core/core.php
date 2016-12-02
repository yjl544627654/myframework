<?php
namespace core;

class core
{

	public static $classMap = array();
	public $assign = array();
	
	function __construct()
	{
		
	}

	static public function run(){

		\core\lib\log::init();
		
		//加载控制器
		$route = new \core\lib\route();
		$ctrl = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrl.'Ctrl.php'; 
		$ctrlName = '\\'.MODULE.'\\'.'ctrl'.'\\'.$ctrl.'Ctrl';
		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrlClass = new $ctrlName;
			$ctrlClass->$action();
			//写入日志
			\core\lib\log::log('ctrl:'.$ctrl.'  '.'action:'.$action);
		}else{
			throw new \Exception("找不到控制器".$ctrlfile);
			
		}
		
	}

	static public function load($class){
		//自动加载类

		$class = str_replace('\\','/',$class);
		$file = IMOOC.'/'.$class.'.php';

		if( is_file($file) ){
			include $file;
			self::$classMap[$class] = $class;
		}else{
			return false;
		}
	}

	public function assign($name,$data){

		$this->assign[$name] = $data;

	}

	public function display($filename){	
		$file = APP.'/viwes/'.$filename;
		if(is_file($file)){
			//extract($this->assign); // 关键函数，赋值到给html文件使用
			//使用 twig 模板引擎
			\Twig_Autoloader::register();

			$loader = new \Twig_Loader_Filesystem(APP.'/viwes/');
			$twig = new \Twig_Environment($loader, array(
				'cache' => IMOOC.'/log/twig/',
				'debug'=>DEBUG
			));
			$template  = $twig->loadTemplate($filename);
			$template ->display($this->assign?$this->assign:'');

		}
	}
}

