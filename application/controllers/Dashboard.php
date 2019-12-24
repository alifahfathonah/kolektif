<?php

class Dashboard extends Controller 
{

	public $isDefaultController = true;
	public $models = ['VendorModel', 'UsersModel']; 
	public $asAccess = false;

	public function index()
	{
		// $model = new UsersModel();
		// $model->data->username = "sales";
		// $model->data->name = "Sales User";
		// $model->data->role = 1;
		// $model->setPassword("sales1234");
		// if ($model->validate()) {
		// 	$model->insert();
		// }
		// else{
		// 	dd($model->errors);
		// }
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
