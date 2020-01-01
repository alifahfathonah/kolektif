<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel','Upload']; 
	public function index()
	{
		$model = new CustomerModel();
		$dataProvider = $model->findAll();
		foreach ($dataProvider as $key => $value) {
			$value->status = $value->company_status;
			$value->phone = $value->no_hp;
		}
		$this->render('customer/index', [
			'model' => $dataProvider,
		]);
	}
	public function create()
	{
		$model = new CustomerModel();
		$upload = new Upload();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$atch_name = null;
			if ($upload->save('image')) {
				$atch_name = $upload->getFileName();
			}
			else if($upload->upload->file_name) {
					$model->errors['image'] = $upload->errors;
			}
			$model->data->image = $atch_name;
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
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
		$upload = new Upload();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$atch_name = null;
			if ($upload->save('image')) {
				$atch_name = $upload->getFileName();
			}
			else if($upload->upload->file_name) {
					$model->errors['image'] = $upload->errors;
			}
			$model->data->image = $atch_name;
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
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
	}
}