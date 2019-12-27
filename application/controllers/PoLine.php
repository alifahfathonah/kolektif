<?php 
class PoLine extends Controller 
{
	public $models = ['PoLineModel', 'ProductModel']; 
	
	public function create($po_id)
	{
		$model = new PoLineModel();
		$product = new ProductModel();
		$product_list = $product->getListForDropdown();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->purchase_id = $po_id;
			if ($model->validate()) {
				$model->insert();
				redirect(base_url().'purchaseorder/edit/'.$po_id);
			}
		}
		$this->render('po_line/form', [
			'model' => $model,
			'product_list' => $product_list
		]);
		
	}

	public function edit($id)
	{
		$model = new PoLineModel($id);
		$product = new ProductModel();
		$product_list = $product->getListForDropdown();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect(base_url().'purchaseorder/edit/'.$model->purchase_id);
			}
		}
		$this->render('po_line/form', [
			'model' => $model,
			'product_list' => $product_list
		]);
		
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new PoLineModel($id);
		try {
			$model->remove();
			// redirect($this->controllerId.'/index/'.$type);
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}
} 