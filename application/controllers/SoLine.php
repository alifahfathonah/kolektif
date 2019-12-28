<?php 
class SoLine extends Controller 
{
	public $models = ['SoLineModel', 'ProductModel']; 
	
	public function create($so_id)
	{
		$model = new SoLineModel();
		$product = new ProductModel();
		$product_list = $product->getListForDropdown();

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->sale_id = $so_id;
			if ($model->validate()) {
				$model->insert();
				redirect(base_url().'saleorder/edit/'.$so_id);
			}
		}
		$this->render('so_line/form', [
			'model' => $model,
			'product_list' => $product_list
		]);
		
	}

	public function edit($id)
	{
		$model = new SoLineModel($id);
		$product = new ProductModel();
		$product_list = $product->getListForDropdown();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect(base_url().'saleorder/edit/'.$model->sale_id);
			}
		}
		$this->render('so_line/form', [
			'model' => $model,
			'product_list' => $product_list,
			'harga' => $harga
		]);
		
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new SoLineModel($id);
		try {
			$model->remove();
			// redirect($this->controllerId.'/index/'.$type);
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}
} 