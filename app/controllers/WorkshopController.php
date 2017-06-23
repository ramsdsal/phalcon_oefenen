<?php
class WorkshopController extends BaseController
{
	
	public function indexAction()
	{
		$this->view->setVars([
			'workshops' => Workshop::find()
		]);

	}

	public function createAction()
	{
		$work = new Workshop();

		$work->name = "Como programar";
		$work->location = "ROtterdam";
		$work->students = 5;
		$result = $work->create();
		if(!$result)
			print_r($work->getMessages());

	}
}