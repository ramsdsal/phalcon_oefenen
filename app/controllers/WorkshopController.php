<?php
class WorkshopController extends BaseController
{
	
	public function indexAction()
	{
		$this->view->setVars([
			'workshops' => Workshop::find([
				'conditions' => 'deleted is NULL',
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
		$status = $work->save();

		if(!$status){
			$this->flash->error('Helaas kunnen we de workshop niet creeren, probeer nog een keer later...');
			return $this->response->redirect('workshop');
		}

		$this->flash->success('De workshop is met success gecreeerd!');
		return $this->response->redirect('workshop');	
		

	}

	public function createStudent()
	{
		$workshop = $this->request->getPost();
		print_r($workshop);
	}

	public function deleteAction($id)
	{
		$wr = Workshop::find($id);
		if(!$wr){
			$this->flash->error('Er is geen workshop met die naam...');
			return $this->response->redirect('workshop');
		}

		$wr->delete();

		$this->flash->success('Workshop is verwijdeerd..');
		return $this->response->redirect('workshop');
	}

	public function showAction($id){
		
		$wr = Workshop::findFirst($id);

		$this->view->setVars([
			'workshop' => $wr			
		]);
	}
}