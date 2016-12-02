<?php
namespace app\ctrl;
use app\model;
//use core\lib\model;

class indexCtrl extends \core\core
{
	
	public function index(){
		
		$title = '这是小标题';

		$model = new model\CommonModel('tp_log');

		//查询全部
		$where = ['admin'=>'admin','ORDER'=>['id'=>'DESC'],'LIMIT'=>5];
		$list = $model->getAll($where);

		//查询一条
		$where2 = ['id'=>'20','ORDER'=>['id'=>'DESC']];
		$show = $model->getOne($where2);

		//查询一个
		$where3 = ['id'=>146];
		$first = $model->getFirst('operate',$where3);


		/*
		//添加数据
		$add_id  = $model->add([
			'admin'=>'admin2',
			'operates'=>'测试插入操作哇']);*/

		
		/*
		//修改
		$save_where = ['id'=>180];
		$ret = $model->save([
			'admin'=>'yjl',
			'addtime'=>'123456',
			'operate'=>'测试修改操作yoooooo'],$save_where);*/

		/*
		//删除数据
		$delRet = $model->del([
			'AND'=>[
				'id[>=]'=>156,
				'id[<=]'=>177,
			]]);*/

		
		$this->assign('hello','hello word');
		$this->assign('title',$title);
		$this->display('index.html');
	}

	public function test(){

		$data = 'test';
		$this->assign('data',$data);
		$this->display('test.html');
	}
}
