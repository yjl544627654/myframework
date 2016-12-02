<?php
namespace core\lib;
use core\lib\conf;
/**
* 数据库连接
*/
class Model extends \medoo
{
	
	function __construct()
	{

		$option = conf::get('database');

	
		parent::__construct($option);

		
	}

}