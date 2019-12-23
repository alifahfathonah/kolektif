<?php 
class Vendor extends Controller 
{
	public $models = ['VendorModel', 'Upload']; 
	public function index()
	{
		$model = new VendorModel();
		$dataProvider = $model->findAll();
		$this->render('vendor/index', [
			'model' => $dataProvider
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new VendorModel($id);
		if ($model->remove()) {
			redirect($this->controllerId.'/index');
		}
		else{
			redirect($this->controllerId.'/index');
		}
	}

	public function create()
	{
		$model = new VendorModel();
		$upload = new Upload();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($upload->save('attachment')) {
				$atch_name = $upload->getFileName();
			}
			else{
				$atch_name = null;
			}
			$model->data->attachment = $atch_name;
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('vendor/form', [
			'model' => $model
		]);
		
	}
	public function edit($id)
	{
		$model = new VendorModel($id);
		$upload = new Upload();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($upload->save('attachment')) {
				$atch_name = $upload->getFileName();
				$model->data->attachment = $atch_name;
			}
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('vendor/form', [
			'model' => $model
		]);
		
	}
} 