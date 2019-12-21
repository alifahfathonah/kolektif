<?php

class Dashboard extends Controller 
{

	public $models = ['AntrianModel']; 
	public function index()
	{
		$model = new AntrianModel();
		$dataProvider = $model->findAll();
		$this->render('dashboard/index', [
			'model' => $dataProvider
		]);
		
	}

	public function edit($id)
	{
		$model = new AntrianModel($id);
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			$model->update();
		}
		$this->render('dashboard/edit', [
			'model' => $model
		]);
	}
}
