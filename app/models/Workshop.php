<?php
use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class Workshop extends \Phalcon\Mvc\Model
{
	public $id;
	public $name;
	public $students;

	public function initialize()
	{
		$this->hasMany('id','Student','workshop_id');

		$this->addBehavior(new softDelete([
			'field' => 'deleted',
			'value' => '1'
		]));
	}

	public function beforeCreate(){
		$this->created_at = date('Y-m-d H:i:s');
	}
	public function beforeUpdate(){
		$this->updated_at = date('Y-m-d H:i:s');
	}
}