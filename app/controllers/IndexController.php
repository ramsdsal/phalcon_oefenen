<?php
class IndexController extends BaseController
{
	
	public function indexAction()
	{
		$this->assets->addCss('css/bootstrap.min.css');
		$this->assets->addJs('css/jquery.min.js');
		$this->assets->addJs('css/bootstrap.min.js');

	}
}
