<?php
namespace app\model;
use core\lib\model;
/**
*/
class CommonModel extends Model
{
	public $table ;
	function __construct($tablename)
	{
		parent::__construct();
		$this->table = $tablename;

	}

	//查询全部
	/*
	$model = new model\CommonModel('tp_log'); 实例化

	$where = ['admin'=>'admin','ORDER'=>['id'=>'DESC'],'LIMIT'=>5];
	$list = $model->getAll($where);
	*/
	public function getAll($where){
		
		$list = $this->select($this->table,'*',$where);
		if( $list == false ){
			$this->p();
		}
		return $list;
	}


	///查询一条
	/*
	$where2 = ['id'=>'20','ORDER'=>['id'=>'DESC']];
	$show = $model->getOne($where2);*/
	public function getOne($where){

		$list = $this->get($this->table,'*',$where);
		if( $list == false ){
			$this->p();
		}
		return $list;
	}


	//查询一个
	/*
	$where3 = ['id'=>146];
	$first = $model->getFirst('operate',$where3);*/
	public function getFirst($column,$where){

		$list = $this->get($this->table,$column,$where);
		if( $list == false ){
			$this->p();
		}
		return $list;
	}


	/*
	添加数据
	$database->save([
	    "type" => "user",
	 	'name'=>'username'
		]);
	*/
	public function add($data){
		$insert_id = $this->insert($this->table,$data);

		if( $insert_id == 0){
			$this->p();
		}
		return $insert_id;
	}


	/*
	修改数据
	$database->save( [
	    "type" => "user",
	 	'name'=>'username'
		], [
		    "user_id[<]" => 1000
		]);
	*/
	public function save($data,$where){
		if(isset($where)){
			$ret = $this->update($this->table,$data,$where);
			if( $ret ==  false  ){
				$this->p();
			}
		}else{
			var_dump('没有设置where');exit;
		}
		
		return $ret;
	}


	/*
	删除数据
	$database->del( [
	    "AND" => [
	        "type" => "business"
	        "age[<]" => 18
	    ]
	]);
	*/
	public function del($where){
		$ret = $this->delete($this->table,$where);
		return $ret;
	}



	public function p(){
		dump( $this->last_query() );
	}

}
