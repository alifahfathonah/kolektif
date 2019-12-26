<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel']; 
	public function index()
	{
		$model = new CustomerModel();
		$dataProvider = $model->findAll();
		$this->render('customer/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new VendorModel($id);
		redirect($this->controllerId.'/index');
	}

	public function create()
	{
		$model = new CustomerModel();
		
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
		$model = new VendorModel($id);

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('customer/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
}