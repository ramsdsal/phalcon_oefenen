<?php
class Student extends \Phalcon\Mvc\Model
{
	public $id;
	public $workshop_id;
	public $name;


	public function initialize()
	{
		$this->belongsTo('workshop_id','workshop','id');
	}

}