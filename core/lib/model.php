<?php
namespace core\lib;
use core\lib\conf;
/**
* 数据库连接
*/
class Model extends \PDO
{
	
	function __construct()
	{
		$data = conf::get('database');

		try {
			//parent::__construct($data['DSN'],$data['USER'],$data['PWD']);
		} catch (\PPDException $e) {
			var_dump($e->getMessage());
		}
	}

}