<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel']; 
	public function index()
	{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
		echo 'hello Customer';
=======
=======
>>>>>>> ede00bbdebb2c51b0514ae9484fa781e21e43be0
=======
>>>>>>> 7d6aa8c25dcfb6fd0f4111f17cb5b383cd759bfa
		$model = new CustomerModel();
		$dataProvider = $model->findAll();
		$this->render('customer/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new CustomerModel($id);
		try {
			$model->remove();
			// redirect($this->controllerId.'/index/'.$type);
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new CustomerModel();
<<<<<<< HEAD
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->insert();
				redirect('customer');
=======
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('customer/form', [
			'model' => $model,
		]);
		
	}
	public function edit($id)
	{
		$model = new CustomerModel($id);

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
>>>>>>> ede00bbdebb2c51b0514ae9484fa781e21e43be0
			}
		}
		$this->render('customer/form', [
			'model' => $model
		]);
<<<<<<< HEAD
	}
	public function edit($id)
	{
		$model = new CustomerModel($id);
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId);
			}
		}
		$this->render('customer/form', [
			'model' => $model
		]);
	}
	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new CustomerModel($id);
		if ($model->remove()) {
			redirect($this->controllerId.'/index');
		}
		else{
			redirect($this->controllerId.'/index');
		}
<<<<<<< HEAD
>>>>>>> 1d05faaaa4a48a1720c09d4c03f54d572136c6d7
=======
		
>>>>>>> ede00bbdebb2c51b0514ae9484fa781e21e43be0
=======
>>>>>>> 7d6aa8c25dcfb6fd0f4111f17cb5b383cd759bfa
	}
}