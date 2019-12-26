<?php 
class Finance extends Controller 
{
	public $models = ['ProductModel', 'UomModel', 'Upload']; 
	public function index()
	{
		$model = new ProductModel();
		$model->select(['product.*', 'uom.name as uom']);
		$model->joinWith('uom', 'uom.id = product.uom_id');
		$dataProvider = $model->findAll();
		$this->render('finance/index', [
			'model' => $dataProvider,
		]);
	}

	public function edit($id)
	{
		$model = new ProductModel($id);
		$upload = new Upload();
		$uom = new UomModel();
		$dropdown_list = $uom->getListForDropdown();

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
		$this->render('finance/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
} 