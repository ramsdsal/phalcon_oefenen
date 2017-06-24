<?php
class Student extends \Phalcon\Mvc\Model
{
	public $id;
	public $workshop_id;
	public $name;


	public function initialize()
	{
		$this->belongsTo('workshop_id','Workshop','id');
	}
	public function beforeCreate(){
		$this->created_at = date('Y-m-d H:i:s');
	}
	public function beforeUpdate(){
		$this->updated_at = date('Y-m-d H:i:s');
	}
}