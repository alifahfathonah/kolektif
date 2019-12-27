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
		$uom = new UomModel();
		$dropdown_list = $uom->getListForDropdown();

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
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