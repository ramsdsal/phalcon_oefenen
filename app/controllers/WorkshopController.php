<?php
class WorkshopController extends BaseController
{
	
	public function indexAction()
	{
		$conditions = ['deleted'=>NULL, 'd'=>1];
		$this->view->setVars([
			'workshops' => Workshop::find([
				'order' => 'created_at DESC'
			])
		]);

	}

	public function createAction()
	{		
		$request = $this->request->getPost();		
		
		if($request['name']=="" || $request['location']=="" || $request['students']==""){			
			$this->flash->error('De velden zijn verplichten');
			return $this->response->redirect('workshop');
		}

		$work = new Workshop();
		$work->name = $request['name'];
		$work->location = $request['location'];
		$work->students = $request['students'];		
		$work->save();

		$this->flash->success('De workshop is met success gecreeerd!');
		return $this->response->redirect('workshop');	

	}

	public function createStudent()
	{
		$workshop = $this->request->getPost();
		print_r($workshop);
	}
}