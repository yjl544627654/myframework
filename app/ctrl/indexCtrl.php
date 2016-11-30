<?php
namespace app\ctrl;

class indexCtrl extends \core\core
{
	
	public function index(){
		
		$title = '这是小标题';
		
		$this->assign('hello','hello word');
		$this->assign('title',$title);
		$this->display('index.html');
	}
}
