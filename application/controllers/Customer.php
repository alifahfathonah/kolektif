<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel']; 
	public function index()
	{
		$model = new CustomerModel();
		$dataProvider = $model->findAll();
		$this->render('customer/index', [
			'model' => $dataProvider
		]);
	}
	public function create()
	{
		$model = new CustomerModel();
		$this->render('customer/form', [
			'model' => $model
		]);
	}
} 