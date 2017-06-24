<?php
class BaseController extends \Phalcon\Mvc\Controller
{
	
	public function initialize()
	{
		$this->assets->addCss('css/bootstrap.min.css');
		$this->assets->addJs('js/jquery.min.js');
		$this->assets->addJs('js/bootstrap.min.js');

	}
}
