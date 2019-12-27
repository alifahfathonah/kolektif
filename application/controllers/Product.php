<?php 
class Product extends Controller 
{
	public $models = ['ProductModel', 'UomModel', 'Upload']; 
	public function index()
	{
		$model = new ProductModel();
		$model->select(['product.*', 'uom.name as uom']);
		$model->joinWith('uom', 'uom.id = product.uom_id');
		$dataProvider = $model->findAll();
		$this->render('product/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new ProductModel($id);
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
		$model = new ProductModel();
		$uom = new UomModel();
		$dropdown_list = $uom->getListForDropdown();
		
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
		$this->render('product/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
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
			
			if ($upload->save('image')) {
				$atch_name = $upload->getFileName();
				$model->data->image = $atch_name;
			}
			else if($upload->upload->file_name) {
				$model->errors['image'] = $upload->errors;
			}
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('product/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
} 