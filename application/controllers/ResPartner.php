<?php 
class ResPartner extends Controller 
{
	public $models = ['ResPartnerModel', 'BusinessFieldModel', 'Upload']; 
	public function index($type)
	{
		$model = new ResPartnerModel();
		$model->select(['res_partner.*', 'business_field.name as bussiness_field']);
		$model->where('type', $type);
		$model->joinWith('business_field', 'business_field.id = res_partner.field_id');
		$dataProvider = $model->findAll();
		$this->render('res_partner/index', [
			'model' => $dataProvider,
			'type' => $type
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new ResPartnerModel($id);
		try {
			$model->remove();
			// redirect($this->controllerId.'/index/'.$type);
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create($type)
	{
		$model = new ResPartnerModel();
		$bfm = new BusinessFieldModel();
		$dropdown_list = $bfm->getListForDropdown();
		
		$upload = new Upload();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->type = $type;
			if ($upload->save('attachment')) {
				$atch_name = $upload->getFileName();
			}
			else{
				$atch_name = 'this is a fucking dummy sentence';
			}
			$model->data->attachment = $atch_name;
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index/'.$type);
			}
		}
		$this->render('res_partner/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
		]);
		
	}

	public function edit($id)
	{
		$model = new ResPartnerModel($id);
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
				redirect($this->controllerId.'/index/'.$model->type);
			}
		}
		$this->render('res_partner/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
}