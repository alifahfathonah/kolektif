<?php

class Dashboard extends Controller 
{

	public $isDefaultController = true;
	public $models = ['VendorModel','UsersModel', 'PoLineModel', 'ProductModel']; 

	public function index()
	{
		$this->render('dashboard/index', [
			
		]);
	}

	public function poline()
	{
		$model = new PoLineModel();
		$vendor = new VendorModel();
		$vendorList = $vendor->getListForDropdown();
		$product = new ProductModel();
		$productList = $product->getListForDropdown('name');
		$this->render('dashboard/poline', [
			'vendor' => $vendorList,
			'product' => $productList,
			'model' => $model
		]);
	}

	public function edit($id)
	{
		$model = new AntrianModel($id);
		// dd($model->data);
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			$model->update();
			redirect('dashboard/index');
		}
		$this->render('dashboard/edit', [
			'model' => $model
		]);
	}

	public function create()
	{
		$model = new AntrianModel();
		if ($this->input->post()!=null) {
			$model->setAttributes($this->input->post());
			// dd($model);
			$model->insert();
			redirect('dashboard/index');
		}
		$this->render('dashboard/edit', [
			'model' => $model
		]);
	}
}
