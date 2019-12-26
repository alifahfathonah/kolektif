<?php 
class Vendor extends Controller 
{
	public $models = ['VendorModel', 'Upload', 'BusinessFieldModel']; 
	public function index()
	{
		$model = new VendorModel();
		$model->select(['vendor.*', 'business_field.name as nameBf']);
		$model->joinWith('business_field', 'business_field.id = vendor.field_id');
		$dataProvider = $model->findAll();
		$this->render('vendor/index', [
			'model' => $dataProvider,
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
		$bfm = new BusinessFieldModel();
		$dropdown_list = $bfm->getListForDropdown();
		
		$upload = new Upload();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($upload->save('attachment')) {
				$atch_name = $upload->getFileName();
			}
			else{
				$model->errors['attachment'] = $upload->errors;
				$atch_name = null;
			}
			$model->data->attachment = $atch_name;
			if ($model->validate()) {
				$model->insert();
				// dd($model->insert());
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('vendor/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
	public function edit($id)
	{
		$model = new VendorModel($id);
		$upload = new Upload();
		$bfm = new BusinessFieldModel();
		$dropdown_list = $bfm->getListForDropdown();

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
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
} 