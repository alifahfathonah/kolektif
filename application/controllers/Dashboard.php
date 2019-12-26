<?php

class Dashboard extends Controller 
{

	public $isDefaultController = true;
	public $models = ['UsersModel']; 

	public function index()
	{
		$this->render('dashboard/index', [
			
		]);
	}

	public function edit($id)
	{
		$model = new AntrianModel($id);
		// dd($model->data);
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			$model->update();
			redirect('dashboard/index');
		}
		$this->render('dashboard/edit', [
			'model' => $model
		]);
	}
	public function vieworder()
	{
		$model = new AntrianModel();
		$data = $model->findAll();
		dd($data);
	}

	public function create()
	{
		$model = new AntrianModel();
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			// dd($model);
			$model->insert();
			redirect('dashboard/index');
		}
		$this->render('dashboard/edit', [
			'model' => $model
		]);
	}
}
