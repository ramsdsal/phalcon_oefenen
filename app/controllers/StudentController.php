<?php
class StudentController extends BaseController
{
	
	public function indexAction()
	{

	}

	public function deleteAction($id)
	{
		$st = Student::findFirst($id);

		$st->delete();

		if(!$st){
			$this->flash->error('Er staat geen deelnemer met deze naam...');
			return $this->response->redirect('workshop/show/');
		}

		$this->flash->success('Deelnemer is met success verwijdeerd!');
		return $this->response->redirect('workshop/show/');
	}
}
?>