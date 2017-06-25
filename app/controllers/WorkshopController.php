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

	public function createStudentAction($id)
	{
		$st = $this->request->getPost();
		$wr = Workshop::findFirst($id);
		$per = new Student();
		$per->name = $st['name'];
		$per->workshop = $wr;
		$per->save();

		$this->flash->success('Deelnemer is toegevoegd met success..');
		return $this->response->redirect('workshop/show/'.$id);		
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

	public function showAction($id)
	{
		
		$wr = Workshop::findFirst($id);

		$this->view->setVars([
			'workshop' => $wr			
		]);
	}

	public function editAction($id)
	{
		$wr = Workshop::findFirst($id);

		$this->view->setVars([
			'workshop' => $wr			
		]);
	}

	public function updateAction($id)
	{
		$request = $this->request->getPost();
		$wr = Workshop::findFirst($id);
		
		if(!$wr->canBeUpdated($request['students']))
		{
			$this->flash->error('De workshop kan niet worden bijgewerkt, omdat het aantal plaatsen niet kleiner kunnen worden dan aantal plaatsen die al geregistreerd zijn.');
			return $this->response->redirect('workshop/edit/'.$id);
		}

		$wr->name = $request['name']; 
		$wr->location = $request['location'];
		$wr->students = $request['students'];
		$wr->save();

		$this->flash->success('De workshop is bijgewerkt.');
			return $this->response->redirect('workshop');
		
	}
}