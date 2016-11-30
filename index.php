<?php

/*入口文件
1.定义常量
2.加载函数库
3.启动框架
*/

define('IMOOC', realpath('./') );
define('CORE', IMOOC.'/core');
define('APP', IMOOC.'/app');
define('MODULE', 'app');
define('DEBUG', true);//开启调试模式

include IMOOC.'/vendor/autoload.php';

if( DEBUG == true ){
	$whoops = new \Whoops\Run;
	$errorTile ='框架出错了';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTile);
	$whoops->pushHandler($option);
	$whoops->register();


	ini_set('display_error', "On");
}else{
	ini_set('display_error', "Off");
}

include CORE.'/common/function.php';
include CORE.'/core.php';

//自动加载类
spl_autoload_register('\core\core::load');

\core\core::run(); // 启动框架




