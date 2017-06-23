<?php
class BaseController extends \Phalcon\Mvc\Controller
{
	
	public function initialize()
	{
		$this->assets->addCss('css/bootstrap.min.css');
		$this->assets->addJs('css/jquery.min.js');
		$this->assets->addJs('css/bootstrap.min.js');

	}
}
